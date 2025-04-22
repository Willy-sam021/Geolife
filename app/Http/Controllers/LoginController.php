<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use App\Models\User;
class LoginController extends Controller
{
    public function show(){
        return view('login');
    }


    public function store(Request $request){
       // $user=User::where('email',$request->email)->first();

        $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],

    ]);


    if (Auth::attempt([
        'email' =>$request->email,
        'password'=>$request->password,
        'is_deleted'=>'0'
    ])) {
        $request->session()->regenerate();

        return redirect()->intended('home');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');



    }





    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('logout','Logout successful');
    }

















}
