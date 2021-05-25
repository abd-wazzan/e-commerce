<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


/////////////new
use App\Models\Product\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ProdactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $pro=[
            [
              
                'name' => 'laptob',
                'category_id' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                 
                'name' => 'Mobile',
                'category_id' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                
                'name' => 'Camera',
                'category_id' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                 
                'name' => 'Trouser',
                'category_id' => '2',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                
                'name' => 'Blous',
                'category_id' => '2',

                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                
                'name' => 'Skirt',
                'category_id' => '2',

                'created_at' => $now,
                'updated_at' => $now,
            ],


            [
                
                'name' => 'Shirt',
                'category_id' => '2',

                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            [
                
                'name' => 'Hour',
                'category_id' => '3',

                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                 
                'name' => 'Earring',/// حلق
                'category_id' => '3',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                 
                'name' => 'ٌRing',///// خاتم
                'category_id' => '3',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
        ];
        foreach ($pro as $pr)
        {
            DB::table('products')->insert($pr);
        }
    }
}
