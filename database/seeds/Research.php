<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Research extends Seeder
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
            DB::table('research')->insert([
                'user_id' => rand(1,200),
                'key_search' => $faker->name,
                'created_at' =>'2021/'.rand(1,12).'/'.rand(1,28),
            ]);
        }
    }
}
