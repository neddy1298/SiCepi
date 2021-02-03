<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $category = [[
            'name' => 'Quote'
        ],[
            'name' => 'Sales Letter'
        ]];

        foreach ($category as $category) {
            Category::create($category);
        }
    }
}
