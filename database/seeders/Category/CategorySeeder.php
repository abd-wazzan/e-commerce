<?php

namespace Database\Seeders\Category;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        DB::table('categories')->truncate();
        DB::statement("SET foreign_key_checks=1");

        ////
        $now = Carbon::now();
        $categories = [
            [
                'id' => 1,
                'name' => 'Electronic Devices',
                'category_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Clothes',
                'category_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Jewelery',
                'category_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Mobiles',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'Labtops',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'name' => 'Smart Watchs',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
