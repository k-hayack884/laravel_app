<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加する
use Illuminate\Support\Facades\Hash;//追加する

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            [
                'id' => 1,
                'name' => 'ズァーク',
                'sort_no' => 1
            ],
            [
                'id' => 2,
                'name' => 'ヒットマン',
                'sort_no' => 2
            ],
            [
                'id' => 3,
                'name' => 'キュルル',
                'sort_no' => 3
            ],
        ]);
    }
}
