<?php

namespace App\Http\Controllers;

use App\EmailPref;
use Illuminate\Http\Request;

class EmailPrefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmailPref  $emailPref
     * @return \Illuminate\Http\Response
     */
    public function show(EmailPref $emailPref)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmailPref  $emailPref
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailPref $emailPref)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmailPref  $emailPref
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pref = EmailPref::where('user_id', $request->user)
                ->where('listing_id', $request->listing)->first();
        if(!$pref){
          $sub = new EmailPref();
          $sub->user_id = $request->user;
          $sub->listing_id = $request->listing;
          $sub->notify = $request->notify;
          if($sub->save()){
            return 1;
          } else {
            return 0;
          }
        } else {
          $pref->delete();
          return 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmailPref  $emailPref
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailPref $emailPref)
    {
        //
    }
}
