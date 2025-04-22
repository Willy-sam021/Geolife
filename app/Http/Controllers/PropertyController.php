<?php

namespace App\Http\Controllers;
use  App\Models\Property;

use App\Models\State;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function show(){
        // $allproperties=Property::with('state')->get();
        $allproperties=Property::limit(5);
        return view('admin_properties',['allproperties'=>$allproperties]);
    }


    public function homeshow(){
        $property=Property::where('is_active','active')->get();
        return view('index',["properties"=>$property]);
    }

    public function showAll(){
        $allproperty=Property::where('is_active','active')->get();
        return view('allproperties',['allproperty'=>$allproperty]);
    }


    public function propdeets($id){
        $prop=Property::findOrFail($id);
        return view('propertydetails',['details'=>$prop]);

    }







}
