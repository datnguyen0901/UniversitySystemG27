<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => 1,
            'idea_id' => 1,
            'content' => 'This is a comment',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'user_id' => 2,
            'idea_id' => 1,
            'content' => 'This is a comment',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'user_id' => 3,
            'idea_id' => 1,
            'content' => 'This is a comment',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'user_id' => 4,
            'idea_id' => 2,
            'content' => 'This is a comment',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'user_id' => 1,
            'idea_id' => 2,
            'content' => 'This is a comment',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'user_id' => 2,
            'idea_id' => 2,
            'content' => 'This is a comment',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'user_id' => 3,
            'idea_id' => 2,
            'content' => 'This is a comment',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
     }
}
