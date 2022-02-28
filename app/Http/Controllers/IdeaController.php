<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Carbon\Carbon;
use App\Models\Submission;
use App\Models\Category;
use App\User;

class IdeaController extends Controller
{
    //

    public function index(){
        $ideas = Idea::all();

        return view('idea.newidea') -> with(compact('ideas'));
}

    public function create(){
        $submissions = Submission::all();
        $categories = Category::all();
        return view('idea.createidea', compact('submissions'), compact('categories'));
}

    public function store(Request $request){    
        $idea = new Idea;
        $idea->title = $request->title;
        $idea->description = $request->description;
        $idea->content = $request->content;
        $idea->submission_id = $request->submission_id;
        $idea->category_id = $request->category_id;
        $idea->user_id = auth()->user()->id;
        $idea->created_at = Carbon::now();
        $idea->updated_at = null;
        $idea->save();
        return redirect('/newidea')->with('success','Idea created successfully');
    }

    public function edit(Idea $idea)
    {
        $submissions = Submission::all();
        $categories = Category::all();
        return view('idea.editidea', compact('submissions','categories','idea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idea $idea)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'updated_at' => Carbon::now(),
        ]);

        $idea->update($request->all());

        return redirect('/newidea')->with('success','Idea updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect('/newidea')->with('success','Idea deleted successfully');
    }
}
