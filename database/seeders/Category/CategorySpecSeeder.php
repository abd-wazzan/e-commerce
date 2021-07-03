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
            [
                'id' => 6,
                'category_id' => 4,
                'name' => 'Camera',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //
            //Laptops
            [
                'id' => 7,
                'category_id' => 5,
                'name' => 'Company',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'category_id' => 5,
                'name' => 'CPU',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'category_id' => 5,
                'name' => 'RAM',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'category_id' => 5,
                'name' => 'Color',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'category_id' => 5,
                'name' => 'Storage',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //Tshirt spec
            [
                'id' => 12,
                'category_id' => 6,
                'name' => 'Fabric',//type of clouthes
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 13,
                'category_id' => 6,
                'name' => 'Size',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 14,
                'category_id' => 6,
                'name' => 'Color',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            ///// pants spec
            [

                'id' => 15,
                'category_id' => 7,
                'name' => 'Fabric',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 16,
                'category_id' => 7,
                'name' => 'Size',//type of clouthes
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 17,
                'category_id' => 7,
                'name' => 'Color',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'category_id' => 7,
                'name' => 'Market',
                'created_at' => $now,
                'updated_at' => $now,
            ],
           ///// Earrings Type

           [
            'id' => 19,
            'category_id' => 8,
            'name' => 'Size',
            'created_at' => $now,
            'updated_at' => $now,

           ],
           [
            'id' => 20,
            'category_id' => 8,
            'name' => 'Type',
            'created_at' => $now,
            'updated_at' => $now,

           ],
         /////  ring Type
           [
            'id' => 21,
            'category_id' => 9,
            'name' => 'Size',
            'created_at' => $now,
            'updated_at' => $now,

           ],
           [
            'id' => 22,
            'category_id' => 9,
            'name' => 'Type',
            'created_at' => $now,
            'updated_at' => $now,

           ],


        ];

        DB::table('category_specs')->insert($specs);
    }
}
