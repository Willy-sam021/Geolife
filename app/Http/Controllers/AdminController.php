<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\StateController;

use App\Models\Property;
use App\Models\Message;
use App\Models\Reply;
use App\Models\User;
use App\Models\State;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function show(){
        $user=User::where('role','user')->get();
        return view('admin',['allusers'=>$user]);
    }

    public function showForm(){
        $states=State::all();
        return view('/admin_form',["allstates"=>$states]);
       // return view('admin_form');
    }

    public function store(Request $request){

        request()->validate([
            "name"=>"required|unique:properties,name|",
            "address"=>"required",
            "state"=>"required",
            "price"=>"required",

            'description'=>'required',
            "propimage"=>"required|mimes:jpeg,jpg,png|max:2048"
        ],
        [
            "name.required"=>"please enter the property name",
            "propimage.required"=>"please select an image"
        ]);

        $propname=$request->name;


        $address=$request->address;
        $state=$request->state;

        $description=$request->description;
        $image=$request->file('propimage');
        $price=$request->price;

        $unique ="GL_".time()."_".$image->getClientOriginalName();

        $image->move("./uploads",$unique);

        $property=new Property();

        $property->name=$propname;
        $property->location=$address;
        $property->state_id=$state;
        $property->price=$price;
        $property->description=$description;
        $property->image=$unique;

        $res=$property->save();

        if($res){
        return redirect()->back()->with("success","Property added Successfully");
    }else{
        return redirect()->back()->with("error","Error adding property");
    }


    }


    public function showMessage(){
        $message=Message::all();

        return view('admin_message',['message'=>$message]);
    }

    public function replyMsg($id){
        $msgid=Message::findOrFail($id);
        return view('admin_reply_msg',['message'=>$msgid]);
    }

    public function sendReply(Request $request){
        $request->validate([
            "reply"=>"required",
            "messageid"=>"required"
        ],
        [
            "reply.required"=>"please type a reply",

        ]);

        $reply= Str::of($request->reply)->stripTags()->lower()->toHtmlString();
        $messageid= Str::of($request->messageid)->stripTags()->lower()->toHtmlString();


        $rep = new Reply;
        $rep->message_id=$messageid;
        $rep->content=$reply;

        $res=$rep->save();
        if($res){
            return redirect()->back()->with('success','Reply sent successfully');
        }else{
            return redirect()->back()->with('error','Error sending reply');
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

        $reply=Reply::where('message_id',$messageid)->first();

        $reply->content=$editreply;
        $reply->created_at=time();

       $res =$reply->save();
        if($res){
            return redirect()->back()->with('editsuccess','Reply updated successfully');
        }else{
            return redirect()->back()->with('editerror','Error updating reply');
        }

    }



    public function allproducts(){
        $property=Property::all();
        return view('admin_allproducts',['property'=>$property]);
    }


    public function propertyDeets($id){

        $prop= Property::find($id);
        $states= State::all();

        return view('admin_product_deets',['property'=>$prop,'state'=>$states]);
    }

    public function propertyUpdate(Request $request){
        // dd($request);
        $request->validate([
            "name"=>"required|",
            "location"=>"required",
            "price"=>"required",
            "description"=>'required|max:2000',
            "image"=> "required|mimes:png,jpg,jpeg|max:2048",
            "activity"=>"required",
            "propid"=>"required",
            "state"=>"required",
        ],
        [
            "acitivity.required"=>"please select a status"
        ]);


        $name= Str::of($request->name)->stripTags()->lower()->toHtmlString();
        $location= Str::of($request->location)->stripTags()->lower()->toHtmlString();
        $price= Str::of($request->price)->stripTags()->lower()->toHtmlString();
        $activity= Str::of($request->activity)->stripTags()->lower()->toHtmlString();
        $description= Str::of($request->description)->stripTags()->lower()->toHtmlString();
        $propid= Str::of($request->propid)->stripTags()->lower()->toHtmlString();
        $state= Str::of($request->state)->stripTags()->lower()->toHtmlString();

        $image=$request->file('image');

        $unique ="GL_".time()."_".$image->getClientOriginalName();

        $image->move("./uploads",$unique);


        $proppy=Property::find($propid);
        $proppy->name=$name;
        $proppy->location=$location;
        $proppy->price=$price;
        $proppy->is_active=$activity;
        $proppy->description=$description;
        $proppy->image=$unique;
        $proppy->state_id=$state;
        $proppy->updated_at=time();

        $res=$proppy->save();
        if($res){
            return redirect()->back()->with('propupdate',"property updated successfully");
        }else{
            return redirect()->back()->with('propupdateerror',"failed to update");
        }


    }

    public function deletebuyer(Request $request){

        $userid= Str::of($request->userid)->stripTags()->lower()->toHtmlString();
        $status= Str::of($request->status)->stripTags()->lower()->toHtmlString();

        $user=User::where('id',$userid)->first();
        if($status == '1'){

            // dd($status);
            $user->is_deleted=$status;
            $res=$user->save();

            if($res){
                return redirect()->back()->with('deletesuccess',"user successfully deactivated");
            }else{
                return redirect()->back()->with('deleteerror',"Error deactivating user");
            }

        }elseif($status == '0'){
            $user->is_deleted=$status;
            $res=$user->save();

            if($res){
                return redirect()->back()->with('deletesuccess',"user successfully activated");
            }else{
                return redirect()->back()->with('deleteerror',"Error activating user");
            }
        }else{
            return redirect()->back()->with('deleteerror',"An error occured");
        }
    }


        public function deleteproperty(Request $request){
        $propid= Str::of($request->propid)->stripTags()->lower()->toHtmlString();
        $status= Str::of($request->status)->stripTags()->lower()->toHtmlString();

        $prop=Property::where('id',$propid)->first();
        if($status == 'active'){

            // dd($status);
            $prop->is_active=$status;
            $res=$prop->save();

            if($res){
                return redirect()->back()->with('deletesuccess',"property successfully activated");
            }else{
                return redirect()->back()->with('deleteerror',"Error deactivating property");
            }

        }elseif($status == 'inactive'){
            $prop->is_active=$status;
            $res=$prop->save();

            if($res){
                return redirect()->back()->with('deletesuccess',"property successfully deactivated");
            }else{
                return redirect()->back()->with('deleteerror',"Error activating property");
            }
        }else{
            return redirect()->back()->with('deleteerror',"An error occured");
        }
        }


}
