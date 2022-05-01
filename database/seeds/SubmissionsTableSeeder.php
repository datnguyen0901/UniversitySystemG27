<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubmissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submissions')->insert([
            'name' => 'Sprint Ideas',
            'description' => 'Contest for ideas for Sprint',
            'closure_date' => '2022-05-01 06:00:00',
            'final_closure_date' => '2022-06-30 23:59:59',
        ]);
        DB::table('submissions')->insert([
            'name' => 'Summer Ideas',
            'description' => 'Contest for ideas for Summer',
            'closure_date' => '2022-04-01 06:00:00',
            'final_closure_date' => '2022-04-30 23:59:59',
        ]);
        DB::table('submissions')->insert([
            'name' => 'Autumn Ideas',
            'description' => 'Contest for ideas for Autumn',
            'closure_date' => '2022-07-01 06:00:00',
            'final_closure_date' => '2022-07-30 23:59:59',
        ]); 
        DB::table('submissions')->insert([
            'name' => 'Winter Ideas',
            'description' => 'Contest for ideas for Winter',
            'closure_date' => '2022-09-01 06:00:00',
            'final_closure_date' => '2022-09-30 23:59:59',
        ]);
        DB::table('submissions')->insert([
            'name' => 'Late Sprint Ideas',
            'description' => 'Contest for ideas for Late Sprint',
            'closure_date' => '2022-02-01 06:00:00',
            'final_closure_date' => '2022-03-01 23:59:59',
        ]);
        DB::table('submissions')->insert([
            'name' => 'Test Submission 1',
            'description' => 'Closure data is over, but still can comment',
            'closure_date' => '2022-04-01 06:00:00',
            'final_closure_date' => '2022-05-01 23:59:59',
        ]);
        DB::table('submissions')->insert([
            'name' => 'Test Submission 2',
            'description' => 'Closure data is over, final Close date is over, but still can view',
            'closure_date' => '2022-04-01 06:00:00',
            'final_closure_date' => '2022-04-10 23:59:59',
        ]);
    }
}
