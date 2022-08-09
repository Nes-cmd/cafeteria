<?php

use Illuminate\Database\Seeder;
use App\MyModel\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::truncate();

        Role::create(['name' => 'app_admin']);
        Role::create(['name' => 'bloger']);
        Role::create(['name' => 'cafe_admin']);
        Role::create(['name' => 'user']);
    }
}
