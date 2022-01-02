<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('primary_categories')->insert([
            [
                'name'=>'サメ',
                'sort_order'=>1,

            ],
            [
                'name' => '大型魚',
                'sort_order'=>2,
            ],
            [
                'name' => '中型魚',
                'sort_order' => 3,
            ],
            [
                'name' => '小型魚',
                'sort_order' => 4,
            ],
            [
                'name' => 'その他',
                'sort_order' => 5,
            ],
        ]);
        DB::table('secondary_categories')->insert([
            [
                'name' => '大型サメ',
                'sort_order' => 1,
                'primary_category_id'=>1

            ],
            [
                'name' => '小型サメ',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => 'マグロ',
                'sort_order' => 3,
                'primary_category_id' => 2
            ],
            [
                'name' => 'アジ',
                'sort_order' => 4,
                'primary_category_id' => 2
            ],
            [
                'name' => 'その他',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],
            [
                'name' => 'タイ',
                'sort_order' => 6,
                'primary_category_id' => 3
            ],
            [
                'name' => 'スズキ',
                'sort_order' => 7,
                'primary_category_id' => 3
            ],
        ]);
    }
}
