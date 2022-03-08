<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reactions')->insert([
            'idea_id' => 1,
            'user_id' => 1,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 4,
            'user_id' => 4,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 1,
            'user_id' => 2,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 3,
            'user_id' => 4,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 1,
            'user_id' => 3,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 2,
            'user_id' => 4,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 6,
            'user_id' => 4,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 2,
            'user_id' => 2,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 2,
            'user_id' => 3,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 8,
            'user_id' => 1,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 8,
            'user_id' => 4,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 8,
            'user_id' => 2,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('reactions')->insert([
            'idea_id' => 8,
            'user_id' => 3,
            'reaction' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
    }
}
