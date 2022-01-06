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
                'filename' => 'fish_shark.png',
                'is_selling' => true
            ],
            [
                'owner_id' => 2,
                'name' => 'ユートのお店',
                'information' => 'デュエルで笑顔を',
                'filename' => 'fish_kue2.png',
                'is_selling' => true
            ],
             [
                'owner_id' => 3,
                'name' => 'サティスファクションタウン',
                'information' => '俺達の満足はこれからだ！',
                'filename' => 'fish_tai.png',
                'is_selling' => true
            ],
            [
                'owner_id' => 4,
                'name' => 'シャークショップ',
                'information' => 'イラっとくるぜ！',
                'filename' => 'fish_buri.png',
                'is_selling' => true
            ],
            [
                'owner_id' => 5,
                'name' => 'シャークショップ',
                'information' => 'イラっとくるぜ！',
                'filename' => 'fish_suzuki.png',
                'is_selling' => true
            ],
            [
                'owner_id' => 6,
                'name' => 'シャークショップ',
                'information' => 'イラっとくるぜ！',
                'filename' => 'fish_shark.png',
                'is_selling' => true
            ],
        ]);
    }
}
