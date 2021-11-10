<?php

use Illuminate\Database\Seeder;
use App\MyModel\Role;

class SampleCafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Saple user which is cafe or estaurant seeder
        $user = \App\User::create([
            'Fname' => 'Sample ',
            'Lname' => 'Restaurant',
            'work_place' => 'Atena tera',
            'telephone' => '0954325423',
            'email' => 'sample@warka.com',
            'password' => Hash::make('password'),
        ]);
        $cafe_admin = Role::where('name', 'cafe_admin')->first();
        $user->roles()->attach($cafe_admin);
        //////////  Product ///////////////////////////////////////////////

        ///////////////////////////////////////////////////////////////////

    }
}
