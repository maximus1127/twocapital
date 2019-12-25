<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Events\ChatMessage;
use Auth;
use Storage;

class MessageController extends Controller
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
      $post_paths = array();
      if($request->post_image != null){
      foreach($request->post_image as $img){
        $path = $img->store('public/post-images');
        array_push($post_paths, $path);
      }
    }
        $message = new Message();
        $message->message = $request->post_content;
        if($request->post_image == null){
          $message->images = null;
        } else {
        $message->images = json_encode($post_paths);
      }
        $message->user_id = Auth::user()->id;
        $message->save();

        $message = $message->fresh();

        $append = '	 <li class="left clearfix">
                           <span class="chat-img1 pull-left">
                           <img src="'.$message->user->avatar_path != null? Storage::url($message->user->avatar_path) : asset('/img/avatar.jpg').'" alt="User Avatar" class="img-circle">
                           </span>
                           <div class="chat-body1 clearfix">
                              <p>'.$message->message.' <br />';
      													if($message->images != null){

      															foreach(json_decode($message->images) as $test){
      															$append .=	'<img src="'.Storage::url($test).'" style="max-width: 50px" onclick="openModal(this)"" class="hover-shadow" />';
                                  };

      													};

      											$append .='	</p>

      												<div class="chat_time pull-right" style="float: right;">'. \Carbon\Carbon::parse($message->created_at)->diffForHumans().'</div>
                           </div>
            </li>';

        event(new ChatMessage($append));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
