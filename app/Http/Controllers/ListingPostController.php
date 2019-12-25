<?php

namespace App\Http\Controllers;

use App\ListingPost;
use App\Listing;
use App\Investment;
use Mail;
use App\User;
use App\Mail\ListingComment;
use Auth;
use Illuminate\Http\Request;

class ListingPostController extends Controller
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
      $update = new ListingPost();
      $update->user_id = Auth::user()->id;
      $update->listing_id = $request->listing_id;
      $update->content = $request->content;
      if($update->save()){
        $investors = Investment::where('listing_id', $request->listing_id)->get();
        $filtered_investors = $investors->unique('user_id');
        // $admins = User::where('role', 'super')->get();

        $admins = User::where('id',1)->get();
        foreach($filtered_investors as $investor){
          Mail::to($investor->user->email)->send(new ListingComment($request->listing_id));
        }
        // foreach($admins as $admin){
        //   Mail::to($admin->email)->send(new ListingComment($request->listing_id));
        // }
        return back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListingPost  $listingPost
     * @return \Illuminate\Http\Response
     */
    public function show(ListingPost $listingPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListingPost  $listingPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ListingPost $listingPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListingPost  $listingPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListingPost $listingPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListingPost  $listingPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListingPost $listingPost)
    {
        //
    }
}
