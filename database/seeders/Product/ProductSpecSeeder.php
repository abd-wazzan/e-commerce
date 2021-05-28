<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("SET foreign_key_checks=0");
        DB::table('product_specs')->truncate();
        DB::statement("SET foreign_key_checks=1");

        $now = Carbon::now();
        $specs=[
            [
                'id' => 1,
                'product_id' => 1,
                'category_spec_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'product_id' => 1,
                'category_spec_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'product_id' => 1,
                'category_spec_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'product_id' => 1,
                'category_spec_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'product_id' => 1,
                'category_spec_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],




            [
                'id' => 6,
                'product_id' => 2,
                'category_spec_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'product_id' => 2,
                'category_spec_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'product_id' => 2,
                'category_spec_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'product_id' => 2,
                'category_spec_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'product_id' => 2,
                'category_spec_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],





            [
                'id' => 11,
                'product_id' => 3,
                'category_spec_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 12,
                'product_id' => 3,
                'category_spec_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 13,
                'product_id' => 3,
                'category_spec_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 14,
                'product_id' => 3,
                'category_spec_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 15,
                'product_id' => 3,
                'category_spec_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],






            [
                'id' => 16,
                'product_id' => 4,
                'category_spec_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 17,
                'product_id' => 4,
                'category_spec_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'product_id' => 4,
                'category_spec_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 19,
                'product_id' => 4,
                'category_spec_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 20,
                'product_id' => 4,
                'category_spec_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ];

        DB::table('product_specs')->insert($specs);
    }
}


