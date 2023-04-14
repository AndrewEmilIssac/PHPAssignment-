<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        // $this->call(UserSeeder::class);
    }
}
