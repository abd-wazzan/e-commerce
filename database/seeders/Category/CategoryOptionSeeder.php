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
        $i = 0;
        $now = Carbon::now();
        $options = [
            //Mobiles-Company
            [
                'id' => ++$i,
                'category_spec_id' => 1,
                'name' => 'Apple',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 1,
                'name' => 'Huawei',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 1,
                'name' => 'Sony',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 1,
                'name' => 'Samsung',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Mobiles-CPU
            [
                'id' => ++$i,
                'category_spec_id' => 2,
                'name' => 'Kirin 710',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 2,
                'name' => 'Snapdragon 630',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 2,
                'name' => 'Snapdragon 700',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Mobiles-RAM
            [
                'id' => ++$i,
                'category_spec_id' => 3,
                'name' => '2GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 3,
                'name' => '4GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 3,
                'name' => '8GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 3,
                'name' => '12GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Mobiles-Color
            [
                'id' => ++$i,
                'category_spec_id' => 4,
                'name' => 'Black',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 4,
                'name' => 'White',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 4,
                'name' => 'Red',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 4,
                'name' => 'Blue',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Mobiles-Storage
            [
                'id' => ++$i,
                'category_spec_id' => 5,
                'name' => '32GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id' => ++$i,
                'category_spec_id' => 5,
                'name' => '64GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 5,
                'name' => '128GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 5,
                'name' => '256GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 5,
                'name' => '512GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Mobiles-Camera
            [
                'id' => ++$i,
                'category_spec_id' => 6,
                'name' => '8 MP',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 6,
                'name' => '12 MP',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 6,
                'name' => '24 MP',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 6,
                'name' => '48 MP',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 6,
                'name' => '64 MP',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Labtops-Company
            [
                'id' => ++$i,
                'category_spec_id' => 7,
                'name' => 'HP',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 7,
                'name' => 'ASUS',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 7,
                'name' => 'Dell',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 7,
                'name' => 'Lenovo',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Labtops-CPU
            [
                'id' => ++$i,
                'category_spec_id' => 8,
                'name' => 'Intel Core i3',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 8,
                'name' => 'Intel Core i5',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 8,
                'name' => 'Intel Core i7',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            //Labtops-RAM
            [
                'id' => ++$i,
                'category_spec_id' => 9,
                'name' => '4GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 9,
                'name' => '8GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 9,
                'name' => '16GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 9,
                'name' => '32GB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Labtops-Color
            [
                'id' => ++$i,
                'category_spec_id' => 10,
                'name' => 'Black',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 10,
                'name' => 'White',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 10,
                'name' => 'Red',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 10,
                'name' => 'Blue',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Labtops-Storage
            [
                'id' => ++$i,
                'category_spec_id' => 11,
                'name' => '512GB HDD',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'id' => ++$i,
                'category_spec_id' => 11,
                'name' => '1TB HDD',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 11,
                'name' => '2TB HDD',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 11,
                'name' => '512GB SSD',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => ++$i,
                'category_spec_id' => 11,
                'name' => '1TB SSD',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //
        ];

        DB::table('category_options')->insert($options);
    }
}
