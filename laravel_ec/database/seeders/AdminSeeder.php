<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name'=>'ドンサウザント',
                'email'=>'don@sauzanto',
                'password' => Hash::make('waregakakikaetanoda'),
                'created_at'=>'2021/01/02 11:11:11'
            ],
            [
                'name' => 'ズァーク',
                'email' => 'haou@burei',
                'password' => Hash::make('imakosohitotuni'),
                'created_at' => '2021/01/03 11:11:11'
            ],
            [
                'name' => 'アポリア',
                'email' => 'zetubou@zetubou',
                'password' => Hash::make('zetubouda'),
                'created_at' => '2021/01/06 11:11:11'
            ]
        ]);
    }
}
