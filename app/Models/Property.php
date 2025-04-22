<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function state(){
      return  $this->belongsTo(State::class);
    }

   public function users(){
    return $this->hasMany(User::class);
   }


}
