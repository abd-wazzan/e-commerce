<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        DB::table('product_options')->truncate();
        DB::statement("SET foreign_key_checks=1");

        $now = Carbon::now();
        $options = [
            [
                'id' => 1,
                'product_spec_id' => 1,
                'category_option_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'product_spec_id' => 6,
                'category_option_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'product_spec_id' => 11,
                'category_option_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 16,
                'product_spec_id' => 16,
                'category_option_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],


            [
                'id' => 2,
                'product_spec_id' => 2,
                'category_option_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'product_spec_id' => 7,
                'category_option_id' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 12,
                'product_spec_id' => 12,
                'category_option_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 17,
                'product_spec_id' => 17,
                'category_option_id' => 7,
                'created_at' => $now,
                'updated_at' => $now,
            ],


            [
                'id' => 3,
                'product_spec_id' => 3,
                'category_option_id' => 8,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'product_spec_id' => 8,
                'category_option_id' => 9,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 13,
                'product_spec_id' => 13,
                'category_option_id' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'product_spec_id' => 18,
                'category_option_id' => 11,
                'created_at' => $now,
                'updated_at' => $now,
            ],


            [
                'id' => 4,
                'product_spec_id' => 4,
                'category_option_id' => 12,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'product_spec_id' => 9,
                'category_option_id' => 13,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 14,
                'product_spec_id' => 14,
                'category_option_id' => 14,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 19,
                'product_spec_id' => 19,
                'category_option_id' => 15,
                'created_at' => $now,
                'updated_at' => $now,
            ],



            [
                'id' => 5,
                'product_spec_id' => 5,
                'category_option_id' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'product_spec_id' => 10,
                'category_option_id' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 15,
                'product_spec_id' => 15,
                'category_option_id' => 17,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 20,
                'product_spec_id' => 20,
                'category_option_id' => 17,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('product_options')->insert($options);
    }
}
