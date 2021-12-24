<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加する
use Illuminate\Support\Facades\Hash;//追加する

class RouteShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('route_shop')->insert([
            [
                'route_id' => 1,
                'shop_id' => 3
            ],
            [
                'route_id' => 1,
                'shop_id' => 2
            ],
            [
                'route_id' => 2,
                'shop_id' => 1
            ],
        ]);
    }
}
