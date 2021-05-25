<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//////////////////////////////new

use App\Models\Product\ProductSpec;
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
        ////////////////////////////////////////////////
            
        $now = Carbon::now();
        $prod_spe=[
            [
                'product_id' => '1',
                'name' => 'Labtop_Type',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '1',
                'name' => 'CPU',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '1',
                'name' => 'RAM',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '1',
                'name' => 'Memory',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '1',
                'name' => 'Laptop_Color',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '1',
                'name' => 'Laptop_Price',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            /////////////////////// mobile
            [
                'product_id' => '2',
                'name' => 'Mobile_Type',
        
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '2',
                'name' => 'CPU',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '2',
                'name' => 'RAM',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '2',
                'name' => 'Memory',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '2',
                'name' => 'Mobile_Color',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '2',
                'name' => 'Mobile_Price',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //////////// for camera
            [
                'product_id' => '3',
                'name' => 'Camera_Type',
        
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
           
           
            [
                'product_id' => '3',
                'name' => 'Camera_Color',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '3',
                'name' => 'Camera_price',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            ///////////////////// for bental
            [
                'product_id' => '4',
                'name' => 'Trouser_Color',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => '4',
                'name' => 'Trouser_Price',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_id' => '4',
                'name' => 'Trouser_Size',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],

              [
                'product_id' => '4',
                'name' => 'Model',///  for mall or female 
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            ////////// for shirt 
            [
                'product_id' => '5',
                'name' => 'Blouse_Color',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            [ 
                'product_id' => '5',
                'name' => 'Blouse_Price',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'product_id' => '5',
                'name' => 'Blouse_Color',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],

              [
                'product_id' => '5',
                'name' => 'Blouse_Price',///  for mall or female 
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //////////////////////////////////////////////اتنورة 
            
            [
                
                'product_id' => '6',
                'name' => 'Skirt_Color',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            [
                'product_id' => '6',
                'name' => '',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [    'type_id' => '6',
                 'name' => 'Skirt_Size',
                  
                 'created_at' => $now,
                 'updated_at' => $now,
            ],

              [ 
                'product_id' => '6',
                'name' => 'Skirt_Model', ///  for mall or female 
    
                'created_at' => $now,
                'updated_at' => $now,
            ],
             /////////////////////////////////////////////////////////////////////////


             
        ];
        foreach ($prod_spe as $spec)
        {
            DB::table('product_specs')->insert($spec);
        }
    }
}
    

