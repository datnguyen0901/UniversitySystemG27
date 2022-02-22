<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    //

    public function view(){
        // test if user is logged in
        // $idea = new Idea();    
        // $idea->title = 'Idea 1';
        // $idea->description = 'Description 1';
        // $idea->content = 'Content 1';
        // $idea->user_id = 1;
        // $idea->category_id = 1;
        // $idea->submission_id = 1;
        // $idea->save();

        $ideas = Idea::all();

        foreach($ideas as $idea){
            echo $idea->title;
        } 
    }

    public function create(Request $request){
        $idea = new Idea();
        $idea->title = $request->title;
        $idea->description = $request->description;
        $idea->content = $request->content;
        $idea->save();
    }

    public function update(Request $request){
        $idea = Idea::find($request->id);
        $idea->title = $request->title;
        $idea->description = $request->description;
        $idea->content = $request->content;
        $idea->save();
    }

    public function delete(Request $request){
        $idea = Idea::find($request->id);
        $idea->delete();
    }

}
