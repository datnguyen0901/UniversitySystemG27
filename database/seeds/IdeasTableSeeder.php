<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


class IdeasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ideas')->insert([
            'title' => 'Laravel',
            'description' => 'Introduce Laravel to the world',
            'content' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern. Laravel is a micro-framework, which means that Laravel is designed to be used as a standalone application or a component library. It is a collection of commonly used components and traits for developing web applications.',
            'category_id' => 1,
            'submission_id' => 1, 
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ideas')->insert([
            'title' => 'React',
            'description' => 'Introduce React to the world',
            'content' => 'React is a JavaScript library for building user interfaces. It is maintained by Facebook and a community of individual developers and companies. React can be used as a base in the development of single-page or mobile applications.',
            'category_id' => 2,
            'submission_id' => 2, 
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ideas')->insert([
            'title' => 'Vue',
            'description' => 'Introduce Vue to the world',
            'content' => 'Vue.js is a progressive framework for building user interfaces. It is a library that combines the best parts of each of these other frameworks. It is a complete rewrite from the same team that built AngularJS.',
            'category_id' => 3,
            'submission_id' => 3, 
            'user_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
