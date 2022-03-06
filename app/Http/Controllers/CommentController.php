<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Idea;
use Carbon\Carbon;
use App\User;
use App\Models\View;
use App\Models\Reaction;
use App\Models\Submission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

        $viewsCount = View::where('idea_id', $idea->id)->count();

        $reactionvalid = Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)->first();
        if ($reactionvalid === null) {
            $reaction = new Reaction;
            $reaction->idea_id = $idea->id;
            $reaction->user_id = auth()->user()->id;
            $reaction->reaction = 0;
            $reaction->save();
          } 
                else {
                    $reaction = Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)->first();           // User exits
                }
  
        return view('comment.newcomment') -> with(compact('comments','idea','user','viewsCount','reaction'));

    }

    public function create(){

        return view('comment.createcomment');
    }

    public function store(Request $request){  
        $submission = DB::table('submissions')
        ->join('ideas', 'submissions.id', '=', 'ideas.submission_id')
        ->select(array('submissions.*', DB::raw('count(ideas.id) as ideas_count')))
        ->where('ideas.id', $request->idea_id)
        ->groupBy('submissions.id')
        ->orderBy('ideas_count', 'desc')
        ->first();
        if ($submission->closure_date > Carbon::now()) {

            $comment = new Comment;
            $comment->content = $request->get('comment_content');
            $comment->user_id = auth()->user()->id;
            $idea = Idea::find($request->get('idea_id'));
            $idea->comments()->save($comment);
            //send mail after comment
            $user = User::find($comment->user_id);
            $ideamail = User::where('id',$idea->user_id)->first();
            Mail::send('emails.commentemail', compact('user','comment'), function ($message) use ($ideamail)
            {
                $message->from('testmailgreenwich2379@gmail.com', 'University System G27');
                $message->to($ideamail->email);
                $message->subject('New comment of your idea has been posted!');
            });
            return back();
        }
        else {
            return back()->with('error', 'Submission is closed!');
        }
    }

    public function replyStore(Request $request)
    {
        $submission = DB::table('submissions')
        ->join('ideas', 'submissions.id', '=', 'ideas.submission_id')
        ->select(array('submissions.*', DB::raw('count(ideas.id) as ideas_count')))
        ->where('ideas.id', $request->idea_id)
        ->groupBy('submissions.id')
        ->orderBy('ideas_count', 'desc')
        ->first();
        if ($submission->closure_date > Carbon::now()) {
        $reply = new Comment();
        $reply->content = $request->get('comment_content');
        $reply->user_id = auth()->user()->id;
        $reply->parent_id = $request->get('comment_id');
        $idea = Idea::find($request->get('idea_id'));
        $idea->comments()->save($reply);
        //send mail after reply
        $user = User::find($reply->user_id);
        $replymail = User::where('id',$reply->user_id)->first();
        Mail::send('emails.replyemail', compact('user','reply'), function ($message) use ($replymail)
        {
            $message->from('testmailgreenwich2379@gmail.com', 'University System G27');
            $message->to($replymail->email);
            $message->subject('New reply of your comment has been posted!');
        });
        return back();
        }
        else {
            return back()->with('error', 'Submission is closed!');
        }
 
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
