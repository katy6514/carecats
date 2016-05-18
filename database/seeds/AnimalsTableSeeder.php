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

        $sexes = array('male','female');
        $enclosure_list = array('A','B','C','D','E','F','G','H','I','J');
        $sub_species_list = array(
            'tiger',
            'lion',
            'cougar',
            'bobcat',
            'leopard',
            'house meow'
        );

        for ($i=0; $i < 25; $i++) {

            $faker = Faker::create();

            $dates = array();
            for ($j=0; $j < 3; $j++) {
                array_push($dates, $faker->date($format = 'Y-m-d', $max = 'now'));
            }
            sort($dates);

            $sex = $sexes[array_rand($sexes)];
            $enclosure = $enclosure_list[array_rand($enclosure_list)];
            $sub_species = $sub_species_list[array_rand($sub_species_list)];

            DB::table('animals')->insert([
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'name' => $faker->firstName($sex),
                'sex' => $sex,
                'sub_species' => $sub_species,
                'bio' => 'Suspendisse sit amet justo orci. Integer id finibus diam, eget maximus turpis. Maecenas nisi nunc, sollicitudin at odio a, mollis porttitor est. Maecenas dolor urna, luctus iaculis neque et, rhoncus sodales tellus. Quisque dignissim massa ac est facilisis porttitor. Maecenas a malesuada orci. Vivamus luctus, est vitae consectetur placerat, dolor eros euismod sapien, sit amet pellentesque justo diam quis dui. Proin cursus lectus diam, eu mollis lacus ullamcorper non. Ut cursus laoreet libero, ac pulvinar nisl lacinia in. Donec quis mauris vel purus faucibus sodales nec sit amet nisi. Sed gravida blandit odio eget porta. Maecenas at vulputate diam, eget varius nisi.',
                'enclosure' => $enclosure,
                'image' => $faker->imageUrl($width = 300, $height = 300, 'cats'),
                'birth_date' => $dates[0],
                'care_date' => $dates[1],
                'rainbow_date' => $dates[2],
            ]);
        }

    }
}
