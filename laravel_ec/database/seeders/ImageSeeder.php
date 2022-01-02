<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'owner_id'=>6,
                'filename' => 'fish_shark.png',
                'title'=>null
            ],
            [
                'owner_id' => 6,
                'filename' => 'fish_suzuki.png',
                'title' => null
            ],
            [
                'owner_id' => 6,
                'filename' => 'fish_tai.png',
                'title' => null
            ],
            [
                'owner_id' => 6,
                'filename' => 'fish_kue2.png',
                'title' => null
            ],
            [
                'owner_id' => 6,
                'filename' => 'fish_maguro2.png',
                'title' => null
            ],
            [
                'owner_id' => 6,
                'filename' => 'fish_buri.png',
                'title' => null
            ]
            ]);
    }
}
