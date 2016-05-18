<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 30; $i++) {

            $faker = Faker::create();

            DB::table('sponsors')->insert([
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'city' => $faker->city,
                'state' => $faker->state,
            ]);
        }
    }
}
