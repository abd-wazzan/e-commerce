<?php

namespace Database\Seeders\Category;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        DB::table('category_options')->truncate();
        DB::statement("SET foreign_key_checks=1");

        $now = Carbon::now();
        $options = [
            [
                'id' => 1,
                'category_spec_id' => 1,
                'name' => 'HP',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'category_spec_id' => 1,
                'name' => 'ASUS',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'category_spec_id' => 1,
                'name' => 'Dell',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'category_spec_id' => 1,
                'name' => 'Lenovo',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'category_spec_id' => 2,
                'name' => 'Kirin 710',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'category_spec_id' => 2,
                'name' => 'Snapdragon 630',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'category_spec_id' => 2,
                'name' => 'Snapdragon 700',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'category_spec_id' => 3,
                'name' => '2GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'category_spec_id' => 3,
                'name' => '4GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'category_spec_id' => 3,
                'name' => '8GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'category_spec_id' => 3,
                'name' => '16GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 12,
                'category_spec_id' => 4,
                'name' => 'Black',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 13,
                'category_spec_id' => 4,
                'name' => 'White',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 14,
                'category_spec_id' => 4,
                'name' => 'Red',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 15,
                'category_spec_id' => 4,
                'name' => 'Blue',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 16,
                'category_spec_id' => 5,
                'name' => '512GB HDD',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id' => 17,
                'category_spec_id' => 5,
                'name' => '1TB HDD',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'category_spec_id' => 5,
                'name' => '2TB HDD',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 19,
                'category_spec_id' => 5,
                'name' => '512GB SSD',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 20,
                'category_spec_id' => 5,
                'name' => '1TB SSD',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('category_options')->insert($options);
    }
}
