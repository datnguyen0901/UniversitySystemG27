<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Idea;
use Carbon\Carbon;
use App\User;
use App\Models\View;

class CommentController extends Controller
{
    //

    public function index(){
        $comments = Comment::all();

        return view('comment.newcomment') -> with(compact('comments'));
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

        $viewsCount = View::where('idea_id', $idea->id)->count();
        return view('comment.newcomment') -> with(compact('comments','idea','user','viewsCount'));
    }

    public function create(){

        return view('comment.createcomment');
}

    public function store(Request $request){    
        $comment = new Comment;
        $comment->content = $request->get('comment_content');
        $comment->user_id = auth()->user()->id;
        $idea = Idea::find($request->get('idea_id'));
        $idea->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->content = $request->get('comment_content');
        $reply->user_id = auth()->user()->id;
        $reply->parent_id = $request->get('comment_id');
        $idea = Idea::find($request->get('idea_id'));
        $idea->comments()->save($reply);

        return back();
    }

    public function edit(Comment $comment)
    {
        return view('comment.editcomment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'updated_at' => Carbon::now(),
        ]);

        $comment->update($request->all());

        return redirect('/comment')->with('success','Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect('/comment')->with('success','Comment deleted successfully');
    }
}
