<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'name' => 'ベクター',
                'email' => 'sinngetu@bekutaa',
                'password' => Hash::make('nanntyatte'),
                'created_at' => '2021/01/02 11:11:11'
            ],
            [
                'name' => 'ロジェ',
                'email' => 'karehamou@owaridesune',
                'password' => Hash::make('serugeee'),
                'created_at' => '2021/01/03 11:11:11'
            ],
            [
                'name' => '紅蓮の悪魔',
                'email' => 'gurennno@akuma',
                'password' => Hash::make('gurennnoakuma'),
                'created_at' => '2021/01/04 11:11:11'
            ]
        ]);
    }
}
