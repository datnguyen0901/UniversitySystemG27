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
            'created_at' => '2022-01-01 06:00:00',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ideas')->insert([
            'title' => 'React',
            'description' => 'Introduce React to the world',
            'content' => 'React is a JavaScript library for building user interfaces. It is maintained by Facebook and a community of individual developers and companies. React can be used as a base in the development of single-page or mobile applications.',
            'category_id' => 2,
            'submission_id' => 2, 
            'user_id' => 2,
            'created_at' => '2022-01-11 06:00:00',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ideas')->insert([
            'title' => 'Vue',
            'description' => 'Introduce Vue to the world',
            'content' => 'Vue.js is a progressive framework for building user interfaces. It is a library that combines the best parts of each of these other frameworks. It is a complete rewrite from the same team that built AngularJS.',
            'category_id' => 3,
            'submission_id' => 3, 
            'user_id' => 3,
            'created_at' => '2022-01-21 06:00:00',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ideas')->insert([
            'title' => 'Angular',
            'description' => 'Introduce Angular to the world',
            'content' => 'Angular is a TypeScript-based open-source web application framework led by the Angular Team at Google and by a community of individuals and corporations. Angular is a complete rewrite from the same team that built AngularJS.',
            'category_id' => 4,
            'submission_id' => 4, 
            'user_id' => 4,
            'created_at' => '2022-02-01 06:00:00',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ideas')->insert([
            'title' => 'Node.js',
            'description' => 'Introduce Node.js to the world',
            'content' => 'Node.js is an open-source, cross-platform JavaScript run-time environment that executes JavaScript code outside of a browser. Node.js lets developers use JavaScript to write command line tools and for server-side scripting—running scripts server-side to produce dynamic web page content before the page is sent to the user\'s web browser.',
            'category_id' => 1,
            'submission_id' => 2, 
            'user_id' => 3,
            'created_at' => '2022-02-11 06:00:00',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ideas')->insert([
            'title' => 'Express.js',
            'description' => 'Introduce Express.js to the world',
            'content' => 'Express.js is a web application framework for Node.js, released as free and open-source software under the MIT License. It is designed for building web applications and APIs. It has been called the de facto standard server framework for Node.js.',
            'category_id' => 2,
            'submission_id' => 3, 
            'user_id' => 4,
            'created_at' => '2022-02-21 06:00:00',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ideas')->insert([
            'title' => 'Vue.js',
            'description' => 'Introduce Vue.js to the world',
            'content' => 'Vue.js is a progressive framework for building user interfaces. It is a library that combines the best parts of each of these other frameworks. It is a complete rewrite from the same team that built AngularJS.',
            'category_id' => 3,
            'submission_id' => 4, 
            'user_id' => 1,
            'created_at' => '2022-03-01 06:00:00',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ideas')->insert([
            'title' => 'CSV test',
            'description' => 'Introduce React to the world',
            'content' => 'React is a JavaScript library for building user interfaces. It is maintained by Facebook and a community of individual developers and companies. React can be used as a base in the development of single-page or mobile applications.',
            'category_id' => 1,
            'submission_id' => 5, 
            'user_id' => 1,
            'created_at' => '2022-01-01 06:00:00',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ideas')->insert([
            'title' => 'Laravel2',
            'description' => 'Test Submission',
            'content' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern. Laravel is a micro-framework, which means that Laravel is designed to be used as a standalone application or a component library. It is a collection of commonly used components and traits for developing web applications.',
            'category_id' => 2,
            'submission_id' => 1, 
            'user_id' => 4,
            'created_at' => '2022-01-15 06:00:00',
            'updated_at' => Carbon::now(),
        ]);
    }
}
