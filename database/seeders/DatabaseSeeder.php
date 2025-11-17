<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
<<<<<<< HEAD
        \App\Models\Article::factory(30)->create();
        \App\Models\Comment::factory(14)->create();
=======
         \App\Models\User::factory(10)->create();
        \App\Models\Article::factory(10)->create();
>>>>>>> origin/master
    }
}
