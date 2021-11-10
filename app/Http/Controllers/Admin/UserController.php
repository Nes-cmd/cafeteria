<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\MyModel\Role;
use App\MyModel\Contact;
use App\MyModel\ActivationRequest;
use Gate;
use Alert;
class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }
    
    public function edit(User $user)
    {
        if (Gate::denies(['edit-users'])) {
            Alert::error('Error','You are not autorized for this action');
            return redirect()->back();
        }
        $role = Role::all();
        return view('admin.users.edit')->with([
            'user' => $user,
            'role' => $role
        ]);
    }
    public function create()
    {
        $message = Contact::all();
        return view('admin.users.messages')->with('messages', $message);
    }
    public function update(Request $request, User $user)
    {
        
        $user->roles()->sync($request->roles);

        $user->Fname = $request->Fname;
        $user->email = $request->email;
        $user->save();
        
        Alert::success('Success','Update succesful');
        return redirect()->route('admin.users.index');
    }
    public function destroy(User $user)
    {
        // if (Gate::denies('delete-users')) {
        //     Alert::error('Error','You are not autorized for this action');
        //     return redirect()->route('admin.users.index');
        // }
        // $x = $user->delete();
        // if ($x) {
        //         return response()->json([
        //         'success'=>$x,
        //         'message'=>'All users data are deleted'
        //     ]);
        // }
        // return response()->json([
        //     'success'=>$x,
        //     'message'=>'Sorry some thing wrong is happened'
        // ]);
        dd('user destroy');
    }
    public function store(Request $request)
    {
        dd('user store');
    }
    public function test()
    {
        $req = ActivationRequest::all();
        return view('admin.users.activationReq')->with('request', $req);
    }
}
