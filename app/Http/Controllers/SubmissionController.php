<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use Carbon\Carbon;

class SubmissionController extends Controller
{
    // public function __construct()
    // {        
    //     $this->middleware('auth');
    //     $this->middleware('role:Admin');
    // }

    
    public function __construct()
    {        
        $this->middleware('auth');
    }

    public function index(){
        $submissions = Submission::all();
        return view('submission.submission') -> with(compact('submissions'));
    }

    public function create(){
            return view('submission.createsubmission');       
}

    public function store(Request $request){    
        $submission = new Submission;
        $submission->name = $request->name;
        $submission->description = $request->description;
        $submission->closure_date = Carbon::parse($request->closure_date)->format('Y-m-d');
        $submission->final_closure_date = Carbon::parse($request->final_closure_date)->format('Y-m-d');
        $submission->save();
        return redirect('/submission')->with('success','Submission created successfully');
    }

    public function edit(Submission $submission)
    {
        return view('submission.editsubmission',compact('submission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'closure_date' => 'required',
            'final_closure_date' => 'required',
        ]);

        $submission->update($request->all());

        return redirect('/submission')->with('success','Submission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submission $submission)
    {
        $submission->delete();

        return redirect('/submission')->with('success','Submission deleted successfully');
    }
}
