<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Consulting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 1; $i < 50; $i++) {
            DB::table('consulting')->insert([
                'center_id' => rand(1,50),
                'user_id' => rand(1,200),
                'email' => $faker->email,
                'full_name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'note' => $faker->text,
                'created_at' =>'2021/'.rand(1,12).'/'.rand(1,28),
            ]);
        }
    }
}
