<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new category;
        $category->category_name = "High priority";
        $category->save();

        $category = new category;
        $category->category_name = "Low priority";
        $category->save();

        $category = new category;
        $category->category_name = "Quick annotation";
        $category->save();

    }
}
