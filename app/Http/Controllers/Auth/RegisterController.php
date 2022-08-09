<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\MyModel\Role;
use App\MyModel\CustomerPlace;
use App\MyModel\OpenCloseTime;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Fname' => ['required', 'string', 'max:15'],
            'Lname' => ['required', 'string', 'max:15'],
            'org' => ['string', 'max:50'],
            'telephone' => ['required', 'numeric'],
            'work_place' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'Fname' => $data['Fname'],
            'Lname' => $data['Lname'],
            'telephone' => $data['telephone'],
            'org' => $data['org'],
            'work_place' => $data['work_place'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);

        $defaultPlace = new CustomerPlace(['exact_location' => 'default','telephone' => $data['telephone'], 'code' => substr($data['telephone'], -4)]);
        $user->customerPlace()->save($defaultPlace);

        $defaultTime = new OpenCloseTime(['open_at' => '9:00', 'close_at' => '21:00']);
        $user->OpenCloseTime()->save($defaultTime);

        return $user;
    }

    // protected function redirectTo()
    // {
    //    return redirect()->route('/nextForm');
    // }
}
