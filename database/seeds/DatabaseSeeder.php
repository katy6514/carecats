<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(AnimalsTableSeeder::class);
        $this->call(ProceduresTableSeeder::class);
        $this->call(SponsorsTableSeeder::class);
        $this->call(AnimalSponsorTableSeeder::class);
        $this->call(UsersTableSeeder::class);



        Model::reguard();
    }
}
