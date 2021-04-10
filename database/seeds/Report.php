<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Report extends Seeder
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
            DB::table('report')->insert([
                'user_id' => rand(1,200),
                'center_id' => rand(1,200),
                'content' => $faker->text,
                'created_at' =>'2021/'.rand(1,12).'/'.rand(1,28),
            ]);
        }
    }
}
