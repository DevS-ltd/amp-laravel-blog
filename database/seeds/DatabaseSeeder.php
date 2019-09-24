<?php

use App\Models\User;
use App\Models\Category;
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
        if (Category::count() === 0) {
            $this->call(CategoriesTableSeeder::class);
        }
        if (User::count() === 0) {
            $this->call(UsersTableSeeder::class);
        }
    }
}
