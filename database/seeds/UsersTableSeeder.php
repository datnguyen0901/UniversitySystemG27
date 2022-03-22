<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dat Nguyen',
            'email' => 'testmailgreenwich2379@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'role_id' => 1,
            'department_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Thuan Khuu',
            'email' => 'khuuquocthuan@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'role_id' => 2,
            'department_id' => 2,
        ]);
        DB::table('users')->insert([
            'name' => 'Quan Nguyen',
            'email' => 'quannagcs190347@fpt.edu.vn',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'role_id' => 3,
            'department_id' => 3,
        ]);
        DB::table('users')->insert([
            'name' => 'Duc Huynh',
            'email' => 'ducht@fpt.edu.vn',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'role_id' => 5,
            'department_id' => 4,
        ]);
        DB::table('users')->insert([
            'name' => 'QA Coordinator of IT department',
            'email' => 'datn82@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'role_id' => 4,
            'department_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'QA Coordinator of Business department',
            'email' => 'ntd8989@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'role_id' => 4,
            'department_id' => 2,
        ]);
        DB::table('users')->insert([
            'name' => 'HR Manager',
            'email' => 'datnttcs20032@fpt.edu.vn',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'role_id' => 7,
            'department_id' => 5,
        ]);
    }
}
