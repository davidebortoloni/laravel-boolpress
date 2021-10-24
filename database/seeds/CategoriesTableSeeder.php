<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_names = ['HTML', 'CSS', 'JS', 'PHP', 'VueJS', 'Laravel'];

        foreach ($category_names as $name) {
            $category = new Category();

            $category->name = $name;

            $category->save();
        }
    }
}
