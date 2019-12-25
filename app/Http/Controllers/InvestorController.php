<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Investment;
use App\Listing;
use App\AdminPost;
use App\Message;
use App\InvestmentReturn;
use Auth;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function __construct()
    {
        $this->middleware('investor');

    }

    public function index()
    {


      $total_dollars = 0;
      $active_dollars = 0;
      $earned_dollars = 0;

      $investmentss = Investment::where('user_id', Auth::user()->id)->get();

      foreach($investmentss as $i){
        if($i->completed == 0 && $i->investment_completed != 2){
          $active_dollars += $i->amount_invested;
        }
        if($i->investment_completed != 2){
        $total_dollars += $i->amount_invested;
      }
      }

      $returns = InvestmentReturn::where('user_id', Auth::user()->id)->get();
      foreach($returns as $r){
        $earned_dollars += $r->amount_returned;
      }


      $og_listings = Listing::all();


      $listings =collect();
      $all_inv = Investment::where('user_id', Auth::user()->id)->pluck('listing_id')->toArray();


      foreach($og_listings as $inv){
        if(!in_array($inv->id, $all_inv)){
          $listings->push($inv);
        }
      }

      $filtered_investments = Investment::where('user_id', Auth::user()->id)->get();
      $investments = $filtered_investments->unique('listing_id');


      $funded_listings= Listing::where('remaining_shares', '0')->get();


      foreach($funded_listings as $fl){
        $first_investment = Investment::where('listing_id', $fl->id)
                                      ->where('investment_completed', '!=', '2')->first();
        $last_investment = Investment::where('listing_id', $fl->id)
                                       ->where('investment_completed', '!=', '2')->latest()->first();
        $elapsed = $fl->funded($last_investment->created_at, $first_investment->created_at);

        $fl->elapsed = $elapsed;
      }


        $messages_raw = Message::orderBy('id', 'desc')->take(100)->get();
        $messages = $messages_raw->reverse();

      return view('map')->with(compact('listings', 'investments', 'og_listings', 'funded_listings', 'messages', 'total_dollars', 'active_dollars', 'investments', 'earned_dollars'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->getFinancials();

      return view('my-profile')->with(compact('user', 'total_dollars', 'active_dollars', 'investments', 'earned_dollars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    private function getFinancials(){
      $total_dollars = 0;
      $active_dollars = 0;
      $earned_dollars = 0;

      $investments = Investment::where('user_id', Auth::user()->id)->get();

      foreach($investments as $i){
        if($i->completed == 0 && $i->investment_completed != 2){
          $active_dollars += $i->amount_invested;
        }
        if($i->investment_completed != 2){
        $total_dollars += $i->amount_invested;
      }
      }

      $returns = InvestmentReturn::where('user_id', Auth::user()->id)->get();
      foreach($returns as $r){
        $earned_dollars += $r->amount_returned;
      }


      $user = User::find(Auth::user()->id);
    }
}
