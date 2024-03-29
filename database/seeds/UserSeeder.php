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
        $faker = \Faker\Factory::create();
        for ($i = 2; $i < 500; $i++) {
            DB::table('user')->insert([
                'password' => bcrypt('test'),
                'email' => $faker->email,
                'full_name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'avatar' => 'avatar-clone.jpg',
                'status' => 1,
                'permission' => 1,
                'created_at' =>'2021/'.rand(1,12).'/'.rand(1,28),
            ]);
        }
    }
}
