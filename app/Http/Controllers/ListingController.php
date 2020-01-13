<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;
use App\Investment;
use App\Update;
use Illuminate\Support\Facades\Storage;
use App\EmailPref;
use Geocoder;
use Auth;
use App\ListingPost;
use Image;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listings.create-listing');
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
        $path= [];

        $img = [];
        for($i = 1; $i < 6; $i++){
        if($request->file('document'.$i)){
        $path[$i] = $request->file('document'.$i)->store('/listing_documents', 'public');
      } else {
        $path[$i] = null;
      }
      }
        for($i = 1; $i < 6; $i++){
        if($request->file('image'.$i)){
        $img[$i] = $request->file('image'.$i)->store('/listing_images', 'public');
      } else {
        $img[$i] = null;
      }
      }
      (string) $temp = $request->address.' '.$request->city.', '.$request->state;

        $geo = Geocoder::getCoordinatesForAddress($temp);

        $listing = new Listing();
        $listing->active = $request->active;
        $listing->title = $request->title;
        $listing->category = $request->category;
        $listing->start_date = $request->start_date;
        $listing->end_date = $request->end_date;
        $listing->address = $request->address;
        $listing->city = $request->city;
        $listing->state = $request->state;
        $listing->zip = $request->zip;
        $listing->public_description = $request->public_description;
        $listing->private_description = $request->private_description;
        $listing->shares = $request->shares;
        $listing->remaining_shares = $request->shares;
        $listing->share_price = $request->share_price;
        $listing->minimum_raise = $request->minimum_raise;
        $listing->target_raise = $request->target_raise;
        $listing->document_1_title = $request->document_1_title;
        $listing->document_2_title = $request->document_2_title;
        $listing->document_3_title = $request->document_3_title;
        $listing->document_4_title = $request->document_4_title;
        $listing->document_5_title = $request->document_5_title;
        $listing->document_1_path = $path[1];
        $listing->document_2_path = $path[2];
        $listing->document_3_path = $path[3];
        $listing->document_4_path = $path[4];
        $listing->document_5_path = $path[5];
        $listing->image_1_path = $img[1];
        $listing->image_2_path = $img[2];
        $listing->image_3_path = $img[3];
        $listing->image_4_path = $img[4];
        $listing->image_5_path = $img[5];
        $listing->lat = $geo['lat'];
        $listing->lng = $geo['lng'];
        if($listing->save()){
        return back()->with('success', 'Listing Successfully Created');
        }
        else{
          return back()->with('error', 'Unable To Save Listing');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        $listing_posts = ListingPost::where('listing_id', $id)->get();
        return view('listings/update-listing')->with(compact('listing', 'listing_posts'));
    }

    public function viewAllActive(){
      $listings = Listing::where('active', 'Active')->get();
      $all_inv = Investment::where('user_id', Auth::user()->id)->pluck('listing_id')->toArray();
      return view('list-layout-full')->with(compact('listings', 'all_inv'));

    }
    public function viewAllFunded(){
      $listings = Listing::where('remaining_shares', '0')->orWhere('active', 'Funded')->get();
        $all_inv = Investment::where('user_id', Auth::user()->id)->pluck('listing_id')->toArray();
      return view('list-layout-full')->with(compact('listings', 'all_inv'));

    }

    public function viewAllInactive(){
      $listings = Listing::where('active', 'Inactive')->get();
      return view('list-layout-full')->with(compact('listings'));
    }

    public function viewAllArchived(){
      $listings = Listing::where('active', 'Archived')->get();
      return view('list-layout-full')->with(compact('listings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    public function deleteDocument(Request $request){
      $listing = Listing::find($request->listing);
      $doc1 = $request->path;
      $doc2 = $request->title;
      $listing->$doc1= null;
      $listing->$doc2 = null;
      $listing->save();
      return response()->json(['deleted'=>'This file has been deleted']);
    }
    public function deleteImage(Request $request){
      $listing = Listing::find($request->listing);
      $doc1 = $request->path;
      $listing->$doc1= null;
      $listing->save();
      return response()->json(['deleted'=>'This image has been deleted']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

      $listing = Listing::find($request->id);

      $path= [];
      $img = [];

      for($i = 1; $i < 6; $i++){
      if($request->file('document'.$i)){
      $path[$i] = $request->file('document'.$i)->store('/listing_documents', 'public');
    } else {
      switch ($i) {
    case 1:
        $path[1] = $request->document1;
        break;
        case 2:
            $path[2] = $request->document2;
            break;
            case 3:
                $path[3] = $request->document3;
                break;
                case 4:
                    $path[4] = $request->document4;
                    break;
                    case 5:
                        $path[5] = $request->document5;
                        break;
                        default:
                            $path[$i] = NULL;
                    }
    }
    }
      for($i = 1; $i < 6; $i++){
      if($request->file('image'.$i)){
      $img[$i] = $request->file('image'.$i)->store('/listing_images', 'public');
    } else {
      switch ($i) {
    case 1:
        $img[1] = $request->image1;
        break;
        case 2:
            $img[2] = $request->image2;
            break;
            case 3:
                $img[3] = $request->image3;
                break;
                case 4:
                    $img[4] = $request->image4;
                    break;
                    case 5:
                        $img[5] = $request->image5;
                        break;
                        default:
                            $img[$i] = NULL;
                    }
    }
    }

      $listing->active = $request->active;
      $listing->title = $request->title;
      $listing->category = $request->category;
      $listing->start_date = $request->start_date;
      $listing->end_date = $request->end_date;
      $listing->address = $request->address;
      $listing->city = $request->city;
      $listing->state = $request->state;
      $listing->zip = $request->zip;
      $listing->public_description = $request->public_description;
      $listing->private_description = $request->private_description;
      $listing->shares = $request->shares;
      $listing->share_price = $request->share_price;
      $listing->minimum_raise = $request->minimum_raise;
      $listing->target_raise = $request->target_raise;
      $listing->document_1_title = $request->document_1_title;
      $listing->document_2_title = $request->document_2_title;
      $listing->document_3_title = $request->document_3_title;
      $listing->document_4_title = $request->document_4_title;
      $listing->document_5_title = $request->document_5_title;
      $listing->document_1_path = $path[1];
      $listing->document_2_path = $path[2];
      $listing->document_3_path = $path[3];
      $listing->document_4_path = $path[4];
      $listing->document_5_path = $path[5];
      $listing->image_1_path = $img[1];
      $listing->image_2_path = $img[2];
      $listing->image_3_path = $img[3];
      $listing->image_4_path = $img[4];
      $listing->image_5_path = $img[5];
      if($listing->save()){
      return back()->with('success', 'Listing Successfully Updated');
      }
      else{
        return back()->with('error', 'Unable To Save Listing');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }

    public function investorListing($id){
      $listing_posts = ListingPost::where('listing_id', $id)->orderBy('created_at', 'desc')->get();
      $listing = Listing::find($id);
      $dollars = 0;

      $percent = ($listing->current_raise / $listing->target_raise) * 100;
      $investor = Investment::where('user_id', Auth::user()->id)
                              ->where('listing_id', $id)
                              ->where('investment_completed', '!=', '2')->get();
      foreach($investor as $inv){
        $dollars += $inv->amount_invested;
      }

      $user_bar_percent = ($dollars/$listing->target_raise) * 100;
      $progress_bar_percent = $percent - $user_bar_percent;


      $updates = Update::where('listing_id', $id)->orderBy('created_at', 'desc')->get();
      $pref = EmailPref::where('user_id', Auth::user()->id)
                        ->where('listing_id', $listing->id)->first();

      return view('listing')->with(compact('listing', 'percent', 'user_bar_percent', 'progress_bar_percent', 'dollars', 'updates', 'listing_posts', 'pref'));
    }
    public function adminListing($id){
      $listing = Listing::find($id);
      $percent = $listing->current_raise / $listing->minimum_raise;
      $investor = Investment::where('user_id', Auth::user()->id)
                              ->where('listing_id', $id)->count();
      $updates = Update::where('listing_id', $id)->orderBy('created_at', 'desc')->get();

      $pref = EmailPref::where('user_id', Auth::user()->id)
                        ->where('listing_id', $listing->id)->first();

      return view('listing')->with(compact('listing', 'percent', 'investor', 'updates', 'pref'));
    }


}
