<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }


    public function store(Request $request){
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
             'password' => 'required|string|min:8|confirmed',

        ]);



      // $firstname= strip_tags($request->fname);
       $firstname= Str::of($request->fname)->stripTags()->lower()->toHtmlString();
       $lastname= Str::of($request->lname)->stripTags()->lower()->toHtmlString();
       $address= Str::of($request->address)->stripTags()->lower()->toHtmlString();
       $email= Str::of($request->email)->stripTags();
       $phone= Str::of($request->phone)->stripTags()->lower()->toHtmlString();
       $password= Hash::make($request->password);


        $user =new User();
        $user->firstname=$firstname;
        $user->lastname=$lastname;
        $user->address=$address;
        $user->email=$email;
        $user->phone=$phone;
        $user->password=$password;
        $res=$user->save();
        if($res){
        return redirect()->route('login')->with('regsuccess','Registration successful');
    }else{
        return redirect()->route('register')->with('regfailure','Registration unsuccessful');
    }


    }
}
