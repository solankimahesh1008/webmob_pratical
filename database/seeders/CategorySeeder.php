<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleCategory = [
            ['name' => 'Sports'], ['name' => 'Technology'], ['name' => 'Entertainments'],
            ['name' => 'news'], ['name' => 'Politics'], ['name' => 'Education']
        ];
        Category::insert($createMultipleCategory);

    }
}
