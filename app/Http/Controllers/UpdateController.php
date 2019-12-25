<?php

namespace App\Http\Controllers;

use App\Update;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ListingInfoUpdate;
use Auth;
use App\Investment;

class UpdateController extends Controller
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
        $update = new Update();
        $update->user_id = Auth::user()->id;
        $update->listing_id = $request->listing;
        $update->content = $request->update;
        if($update->save()){
          if(Auth::user()->role == 'super'){
            $content = $update->fresh();
          $investors = Investment::where('listing_id', $request->listing)->get();
          $filtered_investors = $investors->unique('user_id');
          foreach($filtered_investors as $investor){
            Mail::to($investor->user->email)->send(new ListingInfoUpdate($content));
            }

          } else {
            return back();
          }
          return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update $update)
    {
        $update = Update::find($request->update_id);
        $update->seen = 1;
        $update->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        //
    }
}
