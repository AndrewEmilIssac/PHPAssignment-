<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Category A'
        ]);

        $parentCategoryB = Category::create([
            'name' => 'Category B'
        ]);

        Category::create([
            'name' => 'Sub B1',
            'parent_id' => $parentCategoryB->id
        ]);

        Category::create([
            'name' => 'Sub B2',
            'parent_id' => $parentCategoryB->id
        ]);

        $parentSubB2 = Category::create([
            'name' => 'Sub Sub B2-1',
            'parent_id' => $parentCategoryB->id
        ]);

        Category::create([
            'name' => 'Sub Sub B2-2',
            'parent_id' => $parentSubB2->id
        ]);
    }
}
