<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Idea;
use App\User;
use App\Models\Department;
use App\Charts\IdeaChart;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    //

    public function __construct()
    {        
        $this->middleware('auth');
    }

    public function ideachart()
    {
        $departments = DB::table('departments')
        ->join('users', 'departments.id', '=', 'users.department_id')
        ->join('ideas', 'users.id', '=', 'ideas.user_id')
        ->select(array('departments.*', DB::raw('count(ideas.id) as ideas_count')))
        ->groupBy('departments.id')
        ->pluck('ideas_count');

        $departments1 = DB::table('departments')
        ->join('users', 'departments.id', '=', 'users.department_id')
        ->join('ideas', 'users.id', '=', 'ideas.user_id')
        ->select(array('departments.*', DB::raw('count(ideas.id) as ideas_count')))
        ->groupBy('departments.id')
        ->pluck('departments.name');
        
        $chart = new IdeaChart;
        $chart->labels($departments1);
        $chart->dataset('Number of ideas base on Department', 'line', $departments)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
    ]);
    

    return view('charts.ideaschart', compact('chart'));
    }

    public function viewchart()
    {
        $departments = DB::table('departments')
        ->join('users', 'departments.id', '=', 'users.department_id')
        ->join('views', 'users.id', '=', 'views.user_id')
        ->select(array('departments.*', DB::raw('count(views.id) as views_count')))
        ->groupBy('departments.id')
        ->pluck('views_count');

        $departments1 = DB::table('departments')
        ->join('users', 'departments.id', '=', 'users.department_id')
        ->join('views', 'users.id', '=', 'views.user_id')
        ->select(array('departments.*', DB::raw('count(views.id) as views_count')))
        ->groupBy('departments.id')
        ->pluck('departments.name');
        
        $chart = new IdeaChart;
        $chart->labels($departments1);
        $chart->dataset('Number of views base on Department', 'bar', $departments)->options([
            'fill' => 'true',
            'borderColor' => 'black',
            'backgroundColor' => 'gray'
        ]);
        return view('charts.ideaschart', compact('chart'));
    }
    
    public function reactionchart()
    {
        $departments = DB::table('departments')
        ->join('users', 'departments.id', '=', 'users.department_id')
        ->join('reactions', 'users.id', '=', 'reactions.user_id')
        ->select(array('departments.*', DB::raw('count(reactions.id) as reactions_count')))
        ->groupBy('departments.id')
        ->pluck('reactions_count');

        $departments1 = DB::table('departments')
        ->join('users', 'departments.id', '=', 'users.department_id')
        ->join('reactions', 'users.id', '=', 'reactions.user_id')
        ->select(array('departments.*', DB::raw('count(reactions.id) as reactions_count')))
        ->groupBy('departments.id')
        ->pluck('departments.name');
        
        $chart = new IdeaChart;
        $chart->labels($departments1);
        $chart->dataset('Number of reactions base on Department', 'polarArea', $departments)->options([
            'fill' => 'true',
            'borderColor' => 'black',
            'backgroundColor' => [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
                'rgb(54, 162, 235)'
              ]
    ]);

    return view('charts.ideaschart', compact('chart'));
    }
}



