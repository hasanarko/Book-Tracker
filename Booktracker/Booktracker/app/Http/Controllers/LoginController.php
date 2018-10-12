<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    // request for login index page
    public function index(){
        return view('Login.index');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect(route('login'));
    }

    // User login verification
    public function verifyUser(LoginRequest $request){

        // for admin
            $admin = Admin::where([
                'admin_username' => $request->username,
                'admin_password' => $request->password
            ])->first();

            if($admin){
                $request->session()->put('admin', $admin);
                return redirect(route('summary'));
            }
        // end for admin

        $user = User::where([
            'user_name' => $request->username,
            'user_password' => $request->password
        ])->first();

        if($user){
            // checking for block users
            $userStatus = DB::table('users')
                                    ->join('user_statuses', 'user_statuses.user_id', '=', 'users.user_id')
                                    ->where('users.user_id', $user->user_id)
                                    ->first();

            if($userStatus->user_status == 'block')
            {
                $request->session()->flash('error_message', 'Opps! User Blocked');
                return redirect('/login');
            }

            $request->session()->put('user', $user);
            return redirect(route('AllBooks'));
        }
        else{
            $request->session()->flash('error_message', 'Invalid username or password');
            return redirect('/login');
        }
    }
}
