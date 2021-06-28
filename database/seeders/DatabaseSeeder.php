<?php

namespace Database\Seeders;

use Database\Seeders\Category\CategoryOptionSeeder;
use Database\Seeders\Category\CategorySeeder;
use Database\Seeders\Category\CategorySpecSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\Client\UserSeeder;
use Database\Seeders\Product\ProductOptionSeeder;
use Database\Seeders\Product\ProductSeeder;
use Database\Seeders\Product\ProductSpecSeeder;

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
            UserSeeder::class,
            CategorySeeder::class,
            CategorySpecSeeder::class,
            CategoryOptionSeeder::class,
            // ProductSeeder::class,
            // ProductSpecSeeder::class,
            // ProductOptionSeeder::class,
        ]);
    }
}
