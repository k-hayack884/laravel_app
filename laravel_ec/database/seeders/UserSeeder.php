<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'鬼柳',
                'email'=>'gatyapin@manzoku',
                'password' => Hash::make('mannzoku'),
                'created_at'=>'2021/01/02 11:11:11'
            ],
            [
                'name' => '勝鬨',
                'email' => 'rial@fight',
                'password' => Hash::make('dehanainoka'),
                'created_at' => '2021/01/06 11:11:11'
            ],
            [
                'name' => '城之内',
                'email' => 'perfect@zyounouti',
                'password' => Hash::make('bonnkotu'),
                'created_at' => '2021/01/26 11:11:11'
            ]
        ]);
    }
}
