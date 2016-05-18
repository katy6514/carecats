<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_list = array(
            'admin',
            'employee',
            'intern'
        );

        $user = \CareCats\User::firstOrCreate(['email' => 'heidi@cats.edu']);
        $user->first_name = 'Heidi';
        $user->last_name = 'CARE';
        $user->status = 'admin';
        $user->email = 'heidi@cats.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \CareCats\User::firstOrCreate(['email' => 'jill@harvard.edu']);
        $user->first_name = 'Jill';
        $user->last_name = 'Jacobson';
        $user->status = 'employee';
        $user->email = 'jill@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \CareCats\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
        $user->first_name = 'Jamal';
        $user->last_name = 'Jones';
        $user->status = 'intern';
        $user->email = 'jamal@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();
    }
}
