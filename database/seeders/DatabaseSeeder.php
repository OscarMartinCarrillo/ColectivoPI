<?php

namespace Database\Seeders;

use App\Models\Post;
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
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ThemeSeeder::class);
        $this->call(PostSeeder::class);
    }
}
