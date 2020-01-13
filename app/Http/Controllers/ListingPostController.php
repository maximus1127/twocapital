<?php

namespace App\Http\Controllers;

use App\ListingPost;
use App\Listing;
use App\Investment;
use Storage;
use Mail;
use App\User;
use App\Message;
use App\Events\ChatMessage;
use App\Mail\ListingComment;
use Auth;
use App\EmailPref;
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
    // public function store(Request $request)
    // {
    //   $update = new ListingPost();
    //   $update->user_id = Auth::user()->id;
    //   $update->listing_id = $request->listing_id;
    //   $update->content = $request->content;
    //   if($update->save()){
    //     $investors = Investment::where('listing_id', $request->listing_id)->get();
    //     $filtered_investors = $investors->unique('user_id');
    //     // $admins = User::where('role', 'super')->get();
    //
    //     $admins = User::where('id',1)->get();
    //     foreach($filtered_investors as $investor){
    //       Mail::to($investor->user->email)->send(new ListingComment($request->listing_id));
    //     }
    //     // foreach($admins as $admin){
    //     //   Mail::to($admin->email)->send(new ListingComment($request->listing_id));
    //     // }
    //     return back();
    //   }
    // }


    public function store(Request $request){
      $post_paths = array();
      if($request->post_image != null){
      foreach($request->post_image as $img){
        $path = $img->store('public/post-images');
        array_push($post_paths, $path);
      }
    }
        $message = new ListingPost();
        $message->listing_id = $request->listingId;
        $message->content = $request->post_content;
        if($request->post_image == null){
          $message->images = null;
        } else {
        $message->images = json_encode($post_paths);
      }
        $message->user_id = Auth::user()->id;
        if($message->save()){
          if(Auth::user()->role == 'super'){
          $chat = new Message();
          if(empty($post_paths)){
          $chat->message = "Hey everybody, check out the updates that were just posted on <a href='/investor/investor-listing/".$request->listingId."'>".$request->listingTitle."</a>";
        } else {
          $chat->message = "Hey everybody, check out the photos that were just posted on <a href='/investor/investor-listing/".$request->listingId."'>".$request->listingTitle."</a>";
        }

          $chat->user_id = Auth::user()->id;
          $chat->save();
          $chat = $chat->fresh();

          $append = '<li class="left clearfix">
                             <span class="chat-img1 pull-left">
                             <img src="'.asset('/img/star-gold.png').'">

                             </span>
                             <div class="chat-body1 clearfix">
                                <p>'.htmlspecialchars_decode($chat->message).'</p>

                                <div class="chat_time pull-right" style="float: right;">'. \Carbon\Carbon::parse($chat->created_at)->diffForHumans().'</div>
                             </div>
              </li>';
          event(new ChatMessage($append));
          }
          $investors = Investment::where('listing_id', $request->listingId)->get();
          $filtered_investors = $investors->unique('user_id');
          $admins = User::where('role', 'member manager')->get();
          $prefs = EmailPref::where('listing_id', $request->listingId)->get();

          foreach($filtered_investors as $investor){
            if($prefs->contains('user_id', $investor->id)){
            Mail::to($investor->user->email)->send(new ListingComment($request->listingId));
          }
          }
          // if(Auth::user->role != 'member manager'){
          // foreach($admins as $admin){
          //   Mail::to($admin->email)->send(new ListingComment($request->listingId));
          // }
          // }
          return back();
          }
    }

    public function privateReply(Request $request){
      $post_paths = array();
      if($request->post_image != null){
      foreach($request->post_image as $img){
        $path = $img->store('public/post-images');
        array_push($post_paths, $path);
      }
    }
        $message = new ListingPost();
        $message->listing_id = $request->listingId;
        $message->content = $request->post_content;
        if($request->post_image == null){
          $message->images = null;
        } else {
        $message->images = json_encode($post_paths);
      }
        $message->user_id = Auth::user()->id;
        if($message->save()){

          $investors = Investment::where('listing_id', $request->listingId)->get();
          $filtered_investors = $investors->unique('user_id');
          $admins = User::where('role', 'super')->get();
          $prefs = EmailPref::where('listing_id', $request->listingId)->get();

          foreach($filtered_investors as $investor){
            if($prefs->contains('user_id', $investor->id)){
            Mail::to($investor->user->email)->send(new ListingComment($request->listingId));
          }
          }
          // foreach($admins as $admin){
          //   Mail::to($admin->email)->send(new ListingComment($request->listingId));
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
