<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加する
use Illuminate\Support\Facades\Hash;//追加する

class AreaSeeder extends Seeder
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
                'id'=>1,
                'name'=>'舞網市',
                'sort_no'=>1
            ],
            [
                'id'=>2,
                'name'=>'火星',
                'sort_no'=>2
            ],
            [
                'id'=>3,
                'name'=>'ジャパリパーク',
                'sort_no'=>3
            ],
        ]);
    }
}
