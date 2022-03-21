<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\User;
use App\Models\File;
use Illuminate\Http\Response;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //

    public function __construct()
    {        
        $this->middleware('auth');
    }

    public function fileUpload()
    {
        $user = auth()->user();
        $ideas = Idea::where('user_id', $user->id)->get();
        return view('file.fileUpload',compact('ideas'));
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv,docx,jpg,gif,png|max:2048',
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);

        //save file data to Files table
        $file = new File();
        $file->file_path = $fileName;
        $file->idea_id = $request->idea_id;
        $file->save();
   
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
   
    }

    public function downloadFile($ideaid)
    {
        $zip = new ZipArchive;

        $idea = Idea::find($ideaid);
   
        $fileName = $idea->title.'.zip';

        $files = File::where('idea_id', $ideaid)->get();
           
        if ($zip->open(public_path('zip/'.$fileName), ZipArchive::CREATE) === TRUE)
        {               
            foreach ($files as $file) {
                $zip->addFile(public_path('uploads/'.$file->file_path), $file->file_path);
            }
             
            $zip->close();
        }
    
        return response()->download(public_path('zip/'.$fileName));
    }  
    
    public function delete($fileid)
    {
        $file = File::find($fileid);
        $file->delete();
        return back()->with('success','File deleted successfully');
    }
}
