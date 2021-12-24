<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加する
use Illuminate\Support\Facades\Hash;//追加する

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'id'=>1,
                'shop_name'=>'優勝塾',
                'sort_no'=>1
            ],
            [
                'id'=>2,
                'shop_'=>'オルガの墓',
                'sort_no'=>2
            ],
            [
                'id'=>3,
                'shop_name'=>'地獄',
                'sort_no'=>3
            ],
        ]);
    }
}
