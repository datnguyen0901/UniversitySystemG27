<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    //

    public function view(){
        $ideas = Idea::all();
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
