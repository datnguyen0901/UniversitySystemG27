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
use App\Models\File;

class CommentController extends Controller
{
    //
    public function __construct()
    {        
        $this->middleware('auth');
    }

    public function index(){
        $comments = Comment::all();

        return view('comment.newcomment') -> with(compact('comments'));
    }


    public function show($id){
        //not send user_id in Idea, comment, reply or reaction to protect the owner
        $idea = Idea::select('id', 'title', 'description','content', 'created_at', 'updated_at')->where('id', $id)->first();
        $comments = Comment::select('id', 'content', 'created_at', 'updated_at')->where('idea_id', $id)->orderBy('created_at', 'desc')->get();
        $file = File::where('idea_id',$idea->id)->first();

        $viewsCount = View::where('idea_id', $idea->id)->count();

        $reactionvalid = Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)->first();
        if ($reactionvalid === null) {
            $reaction = new Reaction;
            $reaction->idea_id = $idea->id;
            $reaction->user_id = auth()->user()->id;
            $reaction->reaction = 0;
            $reaction->save();
          } 
            $reaction = Reaction::where('idea_id',$idea->id)->sum('reaction');
        return view('comment.newcomment') -> with(compact('comments','idea','viewsCount','reaction','file'));

    }

    public function create(){

        return view('comment.createcomment');
    }

    public function store(Request $request){
        if ($request->get('comment_content') == null) 
        {
            return redirect()->back()->with('error', 'Comment cannot be empty');
        } 
        $submission = DB::table('submissions')
        ->join('ideas', 'submissions.id', '=', 'ideas.submission_id')
        ->select(array('submissions.*', DB::raw('count(ideas.id) as ideas_count')))
        ->where('ideas.id', $request->idea_id)
        ->groupBy('submissions.id')
        ->orderBy('ideas_count', 'desc')
        ->first();
        if ($submission->final_closure_date > Carbon::now()) {

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
        if ($request->get('comment_content') == null) 
        {
            return redirect()->back()->with('error', 'Reply cannot be empty');
        } 
        $submission = DB::table('submissions')
        ->join('ideas', 'submissions.id', '=', 'ideas.submission_id')
        ->select(array('submissions.*', DB::raw('count(ideas.id) as ideas_count')))
        ->where('ideas.id', $request->idea_id)
        ->groupBy('submissions.id')
        ->orderBy('ideas_count', 'desc')
        ->first();
        if ($submission->final_closure_date > Carbon::now()) {
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
    public function destroy($commentid)
    {
        $comment = Comment::find($commentid);
        $comment->delete();
        return back()->with('success','Comment deleted successfully');
    }
}
