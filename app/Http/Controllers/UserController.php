<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewRegistration;
use Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\UserAccountApproved;
use Illuminate\Auth\Events\Registered;
use App\User;
use Auth;
use DB;
use App\Investment;
use App\InvestmentReturn;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function viewAllUsers(){

      $users = User::with('investment')->orderBy('lname', 'asc')->get();

      foreach($users as $user){
        $total_dollars = 0;
        foreach($user->investment as $inv){
          $total_dollars += $inv->amount_invested;
        }
        $user->dollars = $total_dollars;
      }
      return view('all-users')->with(compact('users', 'total_dollars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth/register');
    }

    public function approvalList(){
      $users = User::with('investment')->where('approved', 0)->orderBy('lname', 'asc')->get();

      foreach($users as $user){
        $total_dollars = 0;
        foreach($user->investment as $inv){
          $total_dollars += $inv->amount_invested;
        }
        $user->dollars = $total_dollars;
      }
      return view('all-users')->with(compact('users', 'total_dollars'));
    }

    public function approveUser($id){
      $user = User::findOrFail($id);
      $user->approved = 1;
      if($user->save()){
      Mail::to($user->email)->send(new UserAccountApproved());
      return back();
      }

    }

    public function declineUser($id){
      $user = User::findOrFail($id);
      $user->delete();
      return back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->role = 'investor';
        $user->fname = $request->first_name;
        $user->lname = $request->last_name;
        $user->organization_name = $request->organization_name;
        $user->organization_type = $request->organization_type;
        $user->email = $request->email;
        $user->password = Hash::make($request->password_confirmation);
        $user->phone = $request->phone;
        $user->state = $request->country;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->zip = $request->postal;
        if($user->save()){
        event(new Registered($user));
        Mail::to('derik.godeaux@gmail.com')->send(new NewRegistration());
        return redirect('/login')->with('success', 'Your application request has been submitted to Salt Capital admin team');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      $completed_dollars = 0;
      $active_dollars = 0;
      $earned_dollars = 0;

      $investmentss = Investment::where('user_id', Auth::user()->id)->get();

      $completed_projects = $investmentss->where('user_id', Auth::user()->id)
                                        ->where('completed', 1)->unique('listing_id')->count();
      $active_projects = $investmentss->where('user_id', Auth::user()->id)
                                          ->where('investment_completed', '!=', 2)
                                          ->where('completed', 0)->unique('listing_id')->count();
      foreach($investmentss as $i){
        if($i->completed == 1 && $i->investment_completed != 2){
          $completed_dollars += $i->amount_invested;
        }
      }
      foreach($investmentss as $i){
        if($i->completed == 0 && $i->investment_completed != 2){
          $active_dollars += $i->amount_invested;
        }
      }

      $returns = InvestmentReturn::where('user_id', Auth::user()->id)->get();
      foreach($returns as $r){
        $earned_dollars += $r->amount_returned;
      }


        $user = User::find(Auth::user()->id);

        return view('my-profile')->with(compact('user', 'total_dollars', 'active_dollars', 'investments', 'earned_dollars', 'completed_dollars', 'active_projects', 'completed_projects'));
    }

    public function updateAvatar(Request $request){
      $user = User::find($request->id);
      if($user->avatar_path != null){
        Storage::delete($user->avatar_path);
      }
      $path = $request->file('avatar')->store('public');
      $user->avatar_path = $path;
      $user->save();

      return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $user = User::find(Auth::user()->id);
      $user->fname = $request->first_name;
      $user->lname = $request->last_name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->organization_name = $request->organization_name;
      $user->address = $request->address;
      $user->state = $request->state;
      $user->city = $request->city;
      $user->zip = $request->zip;
      $user->about_me = $request->about_me;

      if($user->save()){
      return back()->with('success', 'Your profile has been updated.');
    } else {
      return back()->with('error', 'Failed up update profile.');
    }
    }


    public function updatePassword(){
      $user = Auth::user();
      return view('change-password')->with(compact('user'));
    }

    public function storeNewPassword(Request $request){
      $user = Auth::user();

      if (Hash::check($request->oldPw, $user->password)) {

        if($request->newPw1 == $request->newPw2) {
          $inputs = ['newPw2'    => $request->newPw2];

      $rules = [
          'newPw2' => [
              'required',
              'string',
              'min:8',             // must be at least 10 characters in length
              'regex:/[a-z]/',      // must contain at least one lowercase letter
              'regex:/[A-Z]/',      // must contain at least one uppercase letter
              'regex:/[0-9]/',      // must contain at least one digit
              'regex:/[@$!%*#?&]/', // must contain a special character
              ],
          ];

      $validated = \Validator::make( $inputs, $rules );

          if(!$validated->fails()){
         $user->password = Hash::make($request->newPw2);
          if($user->save())
          {
              return back()->with('success', "Password Changed.");
          }
        } else {
          return back()->with('error', 'New password did not meet criteria');
        }
        } else {
          return back()->with('error', 'Passwords Do Not Match');
        }
      } else {
          return back()->with('error', 'Password does not match');
      }
    }



    public function updateUserRole(Request $request){
      $user = User::find($request->user);
      $user->role = $request->role;
      if($user->save()){
        $user = $user->fresh();
        return $user;
      } else {
        return 'Error';
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
