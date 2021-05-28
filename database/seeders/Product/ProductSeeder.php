<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        DB::table('products')->truncate();
        DB::statement("SET foreign_key_checks=1");

        ////
        $now = Carbon::now();
        $products = [
            [
                'id' => 1,
                'category_id' => 4,
                'user_id' => 2,
                'name' => 'S20 Pro',
                'description' => 'Top Smart Phones On The World',
                'price' => 700,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'category_id' => 4,
                'user_id' => 2,
                'name' => 'Huawei Nove 7i',
                'description' => 'Top Seller Phone In China',
                'price' => 500,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'category_id' => 4,
                'user_id' => 2,
                'name' => 'Iphone XS Pro',
                'description' => 'New Apple Phone in 2020',
                'price' => 1500,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'category_id' => 4,
                'user_id' => 2,
                'name' => 'HTC smart Pro',
                'description' => 'Nice mid price phone',
                'price' => 300,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
        DB::table('products')->insert($products);
    }
}
