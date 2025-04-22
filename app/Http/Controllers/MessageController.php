<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function user_prop_interest(Request $request){
        $request->validate([
            "message"=>"required|max:1000",
            "userid"=>"required",
            "propertyid"=>"required"

        ]);

        $message= Str::of($request->message)->stripTags()->lower()->toHtmlString();
        $userid= Str::of($request->userid)->stripTags()->lower()->toHtmlString();
        $propertyid= Str::of($request->propertyid)->stripTags()->lower()->toHtmlString();


        $msg=new Message;
        $msg->message=$message;
        $msg->user_id=$userid;
        $msg->property_id=$propertyid;

        $res=$msg->save();
        if($res){
            return redirect()->back()->with('success','Message sent successfully');
        }else{
            return redirect()->back()->with('error','Error sending message');
        }



    }

}
