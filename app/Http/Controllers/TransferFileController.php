<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\submission;
use App\User;
use App\Models\File;
use Illuminate\Http\Response;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use App\Models\Reaction;

class TransferFileController extends Controller
{

    public function __construct()
    {        
        $this->middleware('auth');
    }

    public function show()
    {

        $submissions = DB::table('submissions')
           ->select('submissions.*')
            ->where('submissions.final_closure_date', '<=', Carbon::now())
            ->paginate(5);
       
        foreach ($submissions as $submission) {
            $submission->final_closure_date = Carbon::parse($submission->final_closure_date)->format('d-m-Y');
            $submission->created_at = Carbon::parse($submission->created_at)->format('d-m-Y');
            $submission->ideas = DB::table('ideas')
            ->join('users', 'ideas.user_id', '=', 'users.id')
            ->join('views', 'ideas.id', '=', 'views.idea_id')
            ->select(array('ideas.*','users.name as username', DB::raw('count(views.id) as views_count')))
            ->where('ideas.submission_id', '=', $submission->id)
            ->groupBy('ideas.id')
            ->orderBy('views_count', 'desc')
            ->get();
            foreach ($submission->ideas as $idea) {
                $reaction = Reaction::where('idea_id',$idea->id)->sum('reaction');
            }
        }

        return view('transfer.transferview')->with(compact('submissions','reaction'));
    }

    public function csvDownload($id)
    {      
            $ideas = DB::table('ideas')
            ->join('users', 'ideas.user_id', '=', 'users.id')
            ->join('views', 'ideas.id', '=', 'views.idea_id')
            ->join('submissions', 'ideas.submission_id', '=', 'submissions.id')
            ->select(array('submissions.*','ideas.*','users.name as username', DB::raw('count(views.id) as views_count')))
            ->where('ideas.submission_id', '=', $id)
            ->groupBy('ideas.id')
            ->orderBy('views_count', 'desc')
            ->get();

            foreach ($ideas as $idea) {
                $idea->final_closure_date = Carbon::parse($idea->final_closure_date)->format('d-m-Y');
                $idea->created_at = Carbon::parse($idea->created_at)->format('d-m-Y');
                $reaction = Reaction::where('idea_id',$idea->id)->sum('reaction');
            }


            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Name of Submission');
            $sheet->setCellValue('B1', 'Title of submission');
            $sheet->setCellValue('C1', 'Author');
            $sheet->setCellValue('D1', 'Closure Date');
            $sheet->setCellValue('E1', 'Final Closure Date');
            $sheet->setCellValue('F1', 'Views');
            $sheet->setCellValue('G1', 'Reactions');
    
            $i = 2;
            foreach ($ideas as $idea) {
                $sheet->setCellValue('A'.$i, $idea->name);
                $sheet->setCellValue('B'.$i, $idea->title);
                $sheet->setCellValue('C'.$i, $idea->username);
                $sheet->setCellValue('D'.$i, $idea->created_at);
                $sheet->setCellValue('E'.$i, $idea->final_closure_date);
                $sheet->setCellValue('F'.$i, $idea->views_count);
                $sheet->setCellValue('G'.$i, $reaction);
                $i++;
            }     
            
            $writer = new Csv($spreadsheet);
            $writer->save(public_path('csv/'.$idea->name.'.csv'));

            return response()->download(public_path('csv/'.$idea->name.'.csv'));

    }
}
