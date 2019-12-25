<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected function redirectTo()
     {
       if(Auth::user()->role == 'super' || Auth::user()->role == 'admin'){
         return '/admin/home';
       }
       if(Auth::user()->role == 'investor' && Auth::user()->approved == 1){
         return '/investor/home';
       }
     }


     protected function credentials(Request $request)
  {
      $credentials = $request->only($this->username(), 'password');
      $credentials['approved'] = 1;

      return $credentials;
  }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
