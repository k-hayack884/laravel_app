<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'owner_id'=>1,
                'name' => 'カードショップ',
                'information' => 'カード10枚発売中',
                'filename' => '',
                'is_selling' => true
            ],
            [
                'owner_id' => 2,
                'name' => 'ユートのお店',
                'information' => 'デュエルで笑顔を',
                'filename' => '',
                'is_selling' => true
            ],
        ]);
    }
}
