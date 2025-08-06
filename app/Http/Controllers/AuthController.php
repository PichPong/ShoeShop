<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function logout(){

        Auth::guard('web')->logout();
        return redirect()->route('Auth.login');

    }

    public function login_submit(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard('web')->attempt($data)){
            return redirect()->route('shoes.show');
        }
        else{
            return redirect()->route('Auth.login');
        }

    }

    public function login(){
        return view('Auth.login');
    }

    public function register_submit(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:32',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('Auth.login')->with('success', 'Register Successfully');

    }

    public function register(){
        return view('Auth.register');
    }

}
