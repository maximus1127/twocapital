<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonInterface;
class Listing extends Model
{
    public function investment(){
      return $this->hasMany('App\Investment');
    }
    public function updates(){
      return $this->hasMany('App\Listing');
    }
    public function listingPosts(){
      return $this->hasMany('App\ListingPost');
    }


    public function funded($time1, $time2){
      $duration = $time1->diffForHumans($time2, ['parts' => 2, 'syntax' => CarbonInterface::DIFF_ABSOLUTE]);
      return $duration;
    }

    public function getShortDescriptionAttribute()
   {
       return Str::words($this->description, 10, '...');
   }
}
