<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Message;
use App\Models\Reply;
use App\Models\User;
use App\Models\State;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userdash(){
      $userid= auth()->user()->id;
    //   dd($userid);
      $msg=Message::where('user_id',$userid)->get();


        return view('user_dash',['usermsg'=>$msg]);
    }

    public function userProfile(){
        return view('user_profile');

    }

    public function userUpdate(Request $request){
        $request->validate([
            "firstname"=>"required",
            "lastname"=>"required",
            "phone"=>"required",
            "address"=>"required"
        ]);

        $firstname=Str::of($request->firstname)->stripTags()->lower()->toHtmlString();
        $lastname=Str::of($request->lastname)->stripTags()->lower()->toHtmlString();
        $phone=Str::of($request->phone)->stripTags()->lower()->toHtmlString();
        $address=Str::of($request->address)->stripTags()->lower()->toHtmlString();

        $userid= auth()->user()->id;
        $user= User::findOrFail($userid);
        $user->firstname=$firstname;
        $user->lastname=$lastname;
        $user->phone=$phone;
        $user->address=$address;
        $res = $user->save();
        if($res){
            return redirect()->back()->with('success','Profile update successful');
        }else{
            return redirect()->back()->with('error','Failed to Update profile');
        }
    }



    public function editReply(Request $request){

        $request->validate([
            "editreply"=>"required",
             "messageid"=>"required"
        ],
        [
            "editreply.required"=>"please type a reply",

        ]);


        $editreply= Str::of($request->editreply)->stripTags()->lower()->toHtmlString();
        $messageid= Str::of($request->messageid)->stripTags()->lower()->toHtmlString();

        $reply=Message::where('id',$messageid)->first();

        $reply->message=$editreply;
        $reply->created_at=time();

       $res =$reply->save();
        if($res){
            return redirect()->back()->with('editsuccess','Reply updated successfully');
        }else{
            return redirect()->back()->with('editerror','Error updating reply');
        }

    }

    public function updateReply($id){
        $msg=Message::findOrFail($id);
        return view('user_update_reply',['user'=>$msg]);
    }



}
