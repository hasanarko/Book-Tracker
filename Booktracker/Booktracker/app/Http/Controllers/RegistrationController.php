<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserStatus;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function index(){
        return view('Registration.register');
    }

    // user register
    public function register_user(RegistrationRequest $request){
        $user = new User();
        $user->user_name = $request->username;
        $user->user_password = $request->pass1;
        $user->user_fullname = $request->user_fullname;
        $user->user_city = $request->city;
        $user->user_address = $request->address;
        $user->user_email = $request->email;
        $user->user_phone = $request->phone;
        $user->save();

        $request->session()->flash('success_message', 'Registration Completed Successsfully');

        // user available table
        $user = User::where('user_name', $request->username)->first();
        $id = $user->user_id;

        $user = new UserStatus();
        $user->user_id = $id;
        $user->user_status = 'active';
        $user->save();

        return redirect()->route('login');
    }
}
