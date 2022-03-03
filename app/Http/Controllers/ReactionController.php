<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;
use App\Models\Idea;
use Carbon\Carbon;

class ReactionController extends Controller
{
    //

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
        Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)
        ->increment('reaction', 1);

        return back();
    } 

    public function dislike($id){    
        Reaction::where('idea_id',$id)->where('user_id',auth()->user()->id)
        ->decrement('reaction', 1);

        return back();
    }
}
