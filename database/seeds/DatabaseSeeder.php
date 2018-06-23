<?php

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
        // $this->call(UsersTableSeeder::class);
        factory(\App\MainCategory::class, 10)->create();
        factory(\App\SubCategory::class, 50)->create();
        factory(\App\FileInfo::class, 100)->create();
    }
}
