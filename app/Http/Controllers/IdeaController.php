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
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
use App\Models\File;
class IdeaController extends Controller
{
    //

        public function __construct()
    {        
        $this->middleware('auth');
    }

    public function myidea(){
        $user_id = auth()->user()->id;
        $ideas = Idea::where("user_id",$user_id)->paginate(5);
        return view('idea.idea') -> with(compact('ideas'));
    }

    public function index(){
        $ideas = Idea::paginate(5);
        return view('idea.newidea') -> with(compact('ideas'));
    }

    public function showmostpopular(){
        $ideas = DB::table('ideas')
        ->join('reactions', 'ideas.id', '=', 'reactions.idea_id')
        ->select(array('ideas.*', DB::raw('sum(reactions.reaction) as reactions_count')))
        ->groupBy('ideas.id')
        ->orderBy('reactions_count', 'desc')
        ->paginate(5);
        
        foreach ($ideas as $idea) {
            $idea->created_at = Carbon::parse($idea->created_at)->format('d-m-Y');
        }

        return view('idea.mostreactionidea') -> with(compact('ideas'));
    }

    public function showmostviewed(){
        $ideas = DB::table('ideas')
        ->join('views', 'ideas.id', '=', 'views.idea_id')
        ->select(array('ideas.*', DB::raw('count(views.id) as views_count')))
        ->groupBy('ideas.id')
        ->orderBy('views_count', 'desc')
        ->paginate(5);
        
        foreach ($ideas as $idea) {
            $idea->created_at = Carbon::parse($idea->created_at)->format('d-m-Y');
        }

        return view('idea.mostviewidea') -> with(compact('ideas'));
    }

    public function lastcreated(){
        $ideas = Idea::orderBy('created_at', 'desc')->paginate(5);
        return view('idea.newidea') -> with(compact('ideas'));
    }

    public function lastcomment(){
        $ideas = DB::table('ideas')
        ->join('comments', 'ideas.id', '=', 'comments.idea_id')
        ->select(array('ideas.id','ideas.title','ideas.description','comments.created_at'))
        ->orderBy('comments.created_at', 'desc')
        ->paginate(5);
        return view('idea.lastcommentidea') -> with(compact('ideas'));
    }

    public function show($id){
        $idea = Idea::find($id);
        $user = User::find($idea->user_id);
        $comments = Comment::find($idea->id); 

        $reactionvalid = Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)->first();
        return redirect('/idea')->with(compact('ideas','user'));
    }
    

    public function create(){
        $submissions = Submission::where('closure_date', '>', Carbon::now())->get();
        $categories = Category::all();
        return view('idea.createidea', compact('submissions'), compact('categories'));
    }

    public function terms(){
        return response()->file(public_path('file\terms.pdf'));
    }

    public function store(Request $request){
        if($request->has('terms')){
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

            $request->validate([
                'file' => 'required|mimes:pdf,xlx,csv,docx,jpg,gif,png|max:2048',
            ]);
      
            $fileName = time().'.'.$request->file->extension();  
       
            $request->file->move(public_path('uploads'), $fileName);
    
            //save file data to Files table
            $file = new File();
            $file->file_path = $fileName;
            $file->idea_id = $idea->id;
            $file->save();

            //mail to QA coordinator when summit idea
            $user = User::find($idea->user_id);
            $qamail = User::where([['role_id',4], ['department_id',$user->department_id]])->first();
            Mail::send('emails.email', compact('user','idea'), function ($message) use ($qamail)
            {
                $message->from('testmailgreenwich2379@gmail.com', 'University System G27');
                $message->to($qamail->email);
                $message->subject('New Idea of your department has been posted!');
            });
 
            return redirect('/idea')->with('success','Idea created successfully');//Checkbox checked
        }else{
            return back()->with('error','Please accept Terms & Conditions!'); //Checkbox not checked
        }    
    }

    public function edit(Idea $idea)
    {
        $submissions = Submission::all();
        $categories = Category::all();
        $files = File::where('idea_id',$idea->id)->get();
        return view('idea.editidea', compact('submissions','categories','idea','files'));
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

        $fileName = time().'.'.$request->file->extension();  
       
        $request->file->move(public_path('uploads'), $fileName);

        $file = new File();
        $file->file_path = $fileName;
        $file->idea_id = $idea->id;
        $file->save();


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
