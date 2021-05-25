<?php
 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
/// new
use App\Models\Category\Type;
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
        $categories=[
            [
                'name' => 'Electronic_Device',
        
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Clothes',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Jewelery',
                
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
        foreach ($categories as $cat)
        DB::table('categories')->insert($cat);
    }
}
