<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentReturn extends Model
{
    public function investment(){
      return $this->belongsTo('App\Investment');
    }
}
