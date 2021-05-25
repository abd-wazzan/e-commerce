<?php

namespace Database\Seeders\Client;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'phone' => '00963-99999999',
                'user_scope' => 'admin',
                'phone_verified_at'=> Carbon::now(),
                'email'=> 'admin@scholar.com',
               'email_verified_at'=> Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'user',
                'username' => 'user',
                'password' => Hash::make('password'),
                'phone' => '00963-99999998',
                'user_scope' => 'user',
                'phone_verified_at'=>Carbon::now(),
                'email'=> 'user@scholar.com',
                'email_verified_at'=> Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'seller',
                'username' => 'seller',
                'password' => Hash::make('password'),
                'phone' => '00963-99999997',
                'user_scope' => 'user seller',
                'phone_verified_at'=>Carbon::now(),
                'email'=> 'seller@scholar.com',
                'email_verified_at'=> Carbon::now()
            ],
            [
                'id' => 4,
                'name' => 'Hani',
                'username' => 'hani_ahmad',
                'password' => Hash::make('123456'),
                'phone' => '00963-957628518',
                'user_scope' => 'user seller',
                'phone_verified_at'=>Carbon::now(),
                'email'=> 'hain@scholar.com',
                'email_verified_at'=> Carbon::now()
            ],
        ]);
    }
}
