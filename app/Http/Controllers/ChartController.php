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
    public function index()
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
        $chart->dataset('Department', 'line', $departments)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
    ]);
    

    return view('charts.ideaschart', compact('chart'));
    }
}



