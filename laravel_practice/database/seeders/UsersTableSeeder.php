<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB; //追加する
use Illuminate\Support\Facades\Hash;//追加する
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name'=>'オルガ',
                'email'=>'olga@ituka.com',
                'password'=>Hash::make('tomarunnzyaneezo')
            ],
            [
                'name'=>'ミカ',
                'email'=>'mikaduki@ohgas.com',
                'password'=>Hash::make('yappasugeeyomikaha')
            ],
            [
                'name'=>'キュルル',
                'email'=>'kyururu@maou.com',
                'password'=>Hash::make('rusifaa')
            ],
            [
                'name'=>'遊矢',
                'email'=>'zaak@haoo.com',
                'password'=>Hash::make('otanosimihakorekarada')
                ]
            ]);
    }
}
