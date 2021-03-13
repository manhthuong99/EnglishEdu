<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('users')->insert([
            'password' => bcrypt('admin123'),
            'email'=>'mthuong03@gmail.com',
            'full_name' =>'Manh Thuong',
            'phone_number' =>'0853897558',
            'avatar' =>'thuongdz.jpg',
            'permision' =>0,
        ]);
        for ($i = 2; $i < 100; $i++) {
            DB::table('users')->insert([
                'password' => bcrypt('test'),
                'email' => $faker->email,
                'full_name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'avatar' => 'avatar-clone.jpg',
                'status' => 1,
                'permission' => 1,

            ]);
        }
    }
}
