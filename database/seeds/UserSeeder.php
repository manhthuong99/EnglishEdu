<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = \Faker\Factory::create();
        DB::table('user')->insert([
            'password' => bcrypt('admin123'),
            'email'=>'admin',
            'full_name' =>'Manh Thuong',
            'phone_number' =>'0853897558',
            'avatar' =>'thuongdz.jpg',
            'permission' =>0,
        ]);
//        for ($i = 2; $i < 100; $i++) {
//            DB::table('user')->insert([
//                'password' => bcrypt('test'),
//                'email' => $faker->email,
//                'full_name' => $faker->name,
//                'phone_number' => $faker->phoneNumber,
//                'avatar' => 'avatar-clone.jpg',
//                'status' => 1,
//                'permission' => 1,
//
//            ]);
//        }
    }
}
