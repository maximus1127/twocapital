<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'role', 'organization_name', 'organization_type', 'address', 'city', 'state', 'zip', 'phone', 'ssn', 'dl_front', 'dl_back',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function investment(){
      return $this->hasMany('App\Investment');
    }

    public function adminpost()
    {
      return $this->hasMany('App\AdminPost');
    }

    public function message(){
      return $this->hasMany('App\Message');
    }
    public function updates(){
      return $this->hasMany('App\Update');
    }

    public function listingPosts(){
      return $this->hasMany('App\ListingPost');
    }

  

    public function validatePw(User $user, Request $request){
      if(Hash::check($request->oldPw, $user->password)){
        return true;
      } else {
        return false;
      }
    }


}
