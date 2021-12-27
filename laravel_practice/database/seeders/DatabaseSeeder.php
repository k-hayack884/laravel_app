<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB; //追加する
use Illuminate\Support\Facades\Hash;//追加する
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(UsersTableSeeder::class);
       $this->call(AreaSeeder::class);
       $this->call(ShopSeeder::class);
        $this->call(RouteSeeder::class);
        $this->call(RouteShopSeeder::class);
    }
}
