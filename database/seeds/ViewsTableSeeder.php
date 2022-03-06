<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('views')->insert([
            'idea_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('views')->insert([
            'idea_id' => 2,
            'user_id' => 2,
        ]);
        DB::table('views')->insert([
            'idea_id' => 3,
            'user_id' => 3,
        ]);
        DB::table('views')->insert([
            'idea_id' => 3,
            'user_id' => 4,
        ]);
        DB::table('views')->insert([
            'idea_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('views')->insert([
            'idea_id' => 2,
            'user_id' => 3,
        ]);
        DB::table('views')->insert([
            'idea_id' => 3,
            'user_id' => 4,
        ]);
        DB::table('views')->insert([
            'idea_id' => 5,
            'user_id' => 1,
        ]);
        DB::table('views')->insert([
            'idea_id' => 6,
            'user_id' => 2,
        ]);
        DB::table('views')->insert([
            'idea_id' => 1,
            'user_id' => 3,
        ]);
        DB::table('views')->insert([
            'idea_id' => 2,
            'user_id' => 4,
        ]);
        DB::table('views')->insert([
            'idea_id' => 3,
            'user_id' => 1,
        ]);
        DB::table('views')->insert([
            'idea_id' => 4,
            'user_id' => 2,
        ]);
        DB::table('views')->insert([
            'idea_id' => 5,
            'user_id' => 3,
        ]);
        DB::table('views')->insert([
            'idea_id' => 6,
            'user_id' => 4,
        ]);
        DB::table('views')->insert([
            'idea_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('views')->insert([
            'idea_id' => 2,
            'user_id' => 2,
        ]);
        DB::table('views')->insert([
            'idea_id' => 3,
            'user_id' => 3,
        ]);
        DB::table('views')->insert([
            'idea_id' => 4,
            'user_id' => 4,
        ]);
        DB::table('views')->insert([
            'idea_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('views')->insert([
            'idea_id' => 2,
            'user_id' => 3,
        ]);
        DB::table('views')->insert([
            'idea_id' => 3,
            'user_id' => 4,
        ]);
        DB::table('views')->insert([
            'idea_id' => 4,
            'user_id' => 1,
        ]);
        DB::table('views')->insert([
            'idea_id' => 5,
            'user_id' => 2,
        ]);
        DB::table('views')->insert([
            'idea_id' => 6,
            'user_id' => 3,
        ]);
        DB::table('views')->insert([
            'idea_id' => 2,
            'user_id' => 2,
        ]);
        
    }
}
