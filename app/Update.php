<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function listing(){
      return $this->belongsTo('App\Listing');
    }
}
