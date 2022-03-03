<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'QA Manager',
        ]);
        DB::table('roles')->insert([
            'name' => 'Staff',
        ]);
        DB::table('roles')->insert([
            'name' => 'QA Coordinator',
        ]);
        DB::table('roles')->insert([
            'name' => 'Head',
        ]);
        DB::table('roles')->insert([
            'name' => 'Lecturer',
        ]);
        DB::table('roles')->insert([
            'name' => 'HR Manager',
        ]);
    }
}
