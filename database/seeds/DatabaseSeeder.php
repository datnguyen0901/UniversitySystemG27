<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            DepartmentsTableSeeder::class,
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            SubmissionsTableSeeder::class,
            IdeasTableSeeder::class,
            CommentsTableSeeder::class,
         ]);
    }
}
