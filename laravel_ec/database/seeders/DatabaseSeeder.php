<?php

namespace Database\Seeders;

use App\Models\Owner;
use App\Models\Product;
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
        $this->call([
            AdminSeeder::class,
            OwnerSeeder::class,
            ShopSeeder::class,
            ImageSeeder::class,
            CategorySeeder::class,
            // ProductSeeder::class,
            // StockSeeder::class,
            UserSeeder::class,

        ]);
    }
}
