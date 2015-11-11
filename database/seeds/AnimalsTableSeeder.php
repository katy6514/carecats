<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {

            $faker = Faker::create();

            DB::table('animals')->insert([
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'name' => $faker->name,
                'enclosure' => $faker->city,
                // seed other data later
            ]);
        }

    }
}
