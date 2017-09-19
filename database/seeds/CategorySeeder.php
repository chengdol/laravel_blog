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
        // some init category objects to seed table
        $category = new Category();
        $category->name = "Java";
        $category->save();

        $category = new Category();
        $category->name = "Php";
        $category->save();

        $category = new Category();
        $category->name = "Python";
        $category->save();

        $category = new Category();
        $category->name = "Leetcode";
        $category->save();

    }
}
