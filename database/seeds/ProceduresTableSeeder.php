<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProceduresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $animal_id = \CareCats\Animal::where('sub_species','=','tiger')->pluck('id');
        DB::table('procedures')->insert([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'animal_id' => $animal_id,
            'title' => 'Tooth Extraction',
            'symptoms' => "Unwillingness to eat, poor temperment",
            'comments' => 'took 1 hour, successful!',
        ]);

        $animal_id = \CareCats\Animal::where('sub_species','=','lion')->pluck('id');
        DB::table('procedures')->insert([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'animal_id' => $animal_id,
            'title' => 'Eye removal',
            'symptoms' => "Failing eyesite, poor temperment",
            'comments' => 'took 3 hours, successful!',
        ]);

        $animal_id = \CareCats\Animal::where('sub_species','=','bobcat')->pluck('id');
        DB::table('procedures')->insert([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'animal_id' => $animal_id,
            'title' => 'Wound suture',
            'symptoms' => "Open wound, seeping, bloody",
            'comments' => 'took 2 hours, successful!',
        ]);

        $animal_id = \CareCats\Animal::where('sub_species','=','cougar')->pluck('id');
        DB::table('procedures')->insert([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'animal_id' => $animal_id,
            'title' => 'Lethargy',
            'symptoms' => "General malaise, little movement",
            'comments' => 'Brought inside, kept under observation for two days',
        ]);

        $animal_id = \CareCats\Animal::where('sub_species','=','leopard')->pluck('id');
        DB::table('procedures')->insert([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'animal_id' => $animal_id,
            'title' => 'Arthritis',
            'symptoms' => "stiff and achy",
            'comments' => 'Brought inside on the recent cold days, given movies to watch and treats and blankets',
        ]);
    }
}
