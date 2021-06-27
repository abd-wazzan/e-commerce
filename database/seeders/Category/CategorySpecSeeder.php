<?php

namespace Database\Seeders\Category;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategorySpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("SET foreign_key_checks=0");
        DB::table('category_specs')->truncate();
        DB::statement("SET foreign_key_checks=1");

        $now = Carbon::now();
        $specs = [
            //Mobiles
            [
                'id' => 1,
                'category_id' => 4,
                'name' => 'Company',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'category_id' => 4,
                'name' => 'CPU',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'category_id' => 4,
                'name' => 'RAM',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'category_id' => 4,
                'name' => 'Color',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'category_id' => 4,
                'name' => 'Storage',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //
            //Laptops
            [
                'id' => 6,
                'category_id' => 5,
                'name' => 'Company',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'category_id' => 5,
                'name' => 'CPU',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'category_id' => 5,
                'name' => 'RAM',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'category_id' => 5,
                'name' => 'Color',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'category_id' => 5,
                'name' => 'Storage',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //
        ];

        DB::table('category_specs')->insert($specs);
    }
}
