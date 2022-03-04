<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Carbon\Carbon;
use App\Models\Submission;
use App\Models\Category;
use App\Models\Comment;
use App\Models\View;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\Reaction;
class IdeaController extends Controller
{
    //

    public function index(){
        $ideas = Idea::paginate(5);
        return view('idea.newidea') -> with(compact('ideas'));
    }

    public function showmostviewed(){
        $ideas = DB::table('ideas')
        ->join('views', 'ideas.id', '=', 'views.idea_id')
        ->select(array('ideas.*', DB::raw('count(views.id) as views_count')))
        ->groupBy('ideas.id')
        ->orderBy('views_count', 'desc')
        ->paginate(5); 
        return view('idea.complexidea') -> with(compact('ideas'));
    }

    public function lastcreated(){
        $ideas = Idea::orderBy('created_at', 'desc')->paginate(5);
        return view('idea.newidea') -> with(compact('ideas'));
    }

    public function show($id){
        $idea = Idea::find($id);
        $user = User::find($idea->user_id);
        $comments = Comment::find($idea->id);

        $view = new View;
        $view->idea_id = $idea->id;
        $view->user_id = auth()->user()->id;
        $view->created_at = Carbon::now();
        $view->save();

        $reactionvalid = Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)->first();
        return redirect('/idea')->with(compact('ideas'));
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
        return redirect('/idea')->with('success','Idea created successfully');
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

        return redirect('/idea')->with('success','Idea updated successfully');
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
