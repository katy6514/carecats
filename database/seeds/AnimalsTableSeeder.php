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
        $gender_list = array('male','female');
        $enclosure_list = array('A','B','C','D','E','F','G','H','I','J');
        $sub_species_list = array(
            'tiger',
            'lion',
            'cougar',
            'bobcat',
            'leopard',
            'house meow'
        );

        for ($i=0; $i < 20; $i++) {

            $faker = Faker::create();

            $dates = array();
            for ($j=0; $j < 3; $j++) {
                array_push($dates, $faker->date($format = 'Y-m-d', $max = 'now'));
            }
            sort($dates);

            $gender = $gender_list[array_rand($gender_list)];
            $enclosure = $enclosure_list[array_rand($enclosure_list)];
            $sub_species = $sub_species_list[array_rand($sub_species_list)];

            DB::table('animals')->insert([
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'name' => $faker->firstName($gender),
                'sub_species' => $sub_species,
                'enclosure' => $enclosure,
                'birth_date' => $dates[0],
                'care_date' => $dates[1],
                'rainbow_date' => $dates[2],
            ]);
        }

    }
}
