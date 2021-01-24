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
        // $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        // $this->call(PlaceSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        // $this->call(CategorySeeder::class);

    }
}
