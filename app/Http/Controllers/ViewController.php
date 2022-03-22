<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\View;
use App\Models\Idea;
use App\User;
use Carbon\Carbon;

class ViewController extends Controller
{

    
    public function __construct()
    {        
        $this->middleware('auth');
        $this->middleware('verified');
    }
    //
    public function store($id){
        $idea = Idea::find($id);
        $id1 = $idea->id;
        $view = new View;
        $view->idea_id = $idea->id;
        $view->user_id = auth()->user()->id;
        $view->created_at = Carbon::now();
        $view->save();

        return redirect('/comment/'.$id1);
    }
}
