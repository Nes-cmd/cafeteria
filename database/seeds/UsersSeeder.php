<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\MyModel\Role;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'app_admin')->first();
        $bloger = Role::where('name', 'bloger')->first();
		$authorRole = Role::where('name', 'cafe_admin')->first();
		$userRole = Role::where('name', 'user')->first();

        $admin = User::create([
        	'Fname' => 'App ',
            'Lname' => 'Admin',
            'work_place' => 'atena tera',
            'telephone' => '09543254 23',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('password'),
        ]);

        $bloger = User::create([
            'Fname' => 'Bloger ',
            'Lname' => 'Bloger',
            'work_place' => 'Atena tera',
            'telephone' => '09543254 24',
            'email' => 'blog@cafe.com',
            'password' => Hash::make('password'),
        ]);

        $author = User::create([
        	'Fname' => 'Cafe ',
            'Lname' => 'Admin',
            'work_place' => 'Atena tera',
            'telephone' => '09543254 24',
        	'email' => 'cafe@cafe.com',
        	'password' => Hash::make('password'),
        ]);

        $user = User::create([
        	'Fname' => 'Generic user',
            'Lname' => 'Admin ',
            'work_place' => 'user',
            'telephone' => '09543254 25',
        	'email' => 'user@user.com',
        	'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
