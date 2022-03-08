<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\User;
use App\Models\File;
use Illuminate\Http\Response;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use App\Models\Submission;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TransferFileController extends Controller
{
    public function show()
    {

        $ideas = DB::table('ideas')
        ->join('submissions', 'ideas.submission_id', '=', 'submissions.id')
        ->join('views', 'ideas.id', '=', 'views.idea_id')
        ->select(array('ideas.*','submissions.*', DB::raw('count(views.id) as views_count')))
        ->where('submissions.closure_date', '<', Carbon::now())
        ->groupBy('views.idea_id')
        ->paginate(5);
       
        foreach ($ideas as $idea) {
            $idea->final_closure_date = Carbon::parse($idea->final_closure_date)->format('d-m-Y');
            $idea->created_at = Carbon::parse($idea->created_at)->format('d-m-Y');
        }

        return view('transfer.transferview')->with(compact('ideas'));
    }

    public function exportCsv($id,Request $request)
    {
        $idea = Idea::find($id);
        $fileName = $idea->id.'.csv';
        
        $tasks = Task::all();
     
             $headers = array(
                 "Content-type"        => "text/csv",
                 "Content-Disposition" => "attachment; filename=$fileName",
                 "Pragma"              => "no-cache",
                 "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                 "Expires"             => "0"
             );
     
             $columns = array('Title', 'Assign', 'Description', 'Start Date', 'Due Date');
     
             $callback = function() use(, $columns) {
                 $file = fopen('php://output', 'w');
                 fputcsv($file, $columns);
     
                 foreach ($tasks as $task) {
                     $row['Title']  = $task->title;
                     $row['Assign']    = $task->assign->name;
                     $row['Description']    = $task->description;
                     $row['Start Date']  = $task->start_at;
                     $row['Due Date']  = $task->end_at;
     
                     fputcsv($file, array($row['Title'], $row['Assign'], $row['Description'], $row['Start Date'], $row['Due Date']));
                 }
     
                 fclose($file);
             };
     
             return response()->stream($callback, 200, $headers);
         }
}