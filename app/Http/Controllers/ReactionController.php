<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;
use App\Models\Idea;
use Carbon\Carbon;

class ReactionController extends Controller
{
    //

    public function __construct()
    {        
        $this->middleware('auth');
    }


    public function index(){
        $reactions = Reaction::all();

        return view('reaction.newreaction') -> with(compact('reactions'));
    }

    public function show(){
        $reactions = Reaction::all();

        return view('reaction.newreaction') -> with(compact('reactions'));
      
    }

    public function create(){

        return view('reaction.createreaction');
    }

    public function like($id){ 
        $reactionvalid = Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)->first();   
        if ($reactionvalid->reaction == 1) {
            return back()->with('error', 'You have already reacted to this idea');
        }
        elseif ($reactionvalid->reaction == -1) {
            Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)
            ->update(['reaction' => 1]);
        }
        else{
            Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)
            ->update(['reaction' => -1]);
        }
        return back();
    } 

    public function dislike($id){   
        $reactionvalid = Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)->first();   
        if ($reactionvalid->reaction == -1) {
            return back()->with('error', 'You have already reacted to this idea');
        }
        elseif ($reactionvalid->reaction == 1) {
            Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)
            ->update(['reaction' => -1]);
        }
        else{ 
        Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)
        ->update(['reaction' => 1]);
        }
        return back();
    }
}
