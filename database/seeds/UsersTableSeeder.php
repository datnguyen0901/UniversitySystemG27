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
    }
}
