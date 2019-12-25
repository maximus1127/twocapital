<?php

namespace App\Http\Controllers;

use App\InvestmentReturn;
use App\Investment;
use App\Listing;
use Auth;
use Response;
use Illuminate\Http\Request;

class InvestmentReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $investment = Investment::find($id);
        return view('reconcile-earnings', compact('$investment'));
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

    public function returnUser(Request $request){
      $investment = Investment::find($request->id);

      $user = $investment->user->fname.' '.$investment->user->lname;
      // $userId = $investment->user_id;

      return response()->json(['investment'=>$investment, 'user' => $user]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ir = new InvestmentReturn();
        $inv = Investment::find($request->investmentID);
        $inv->completed = 1;
        $ir->user_id = $request->investorID;
        $ir->listing_id = $request->listingID;
        $ir->investment_id = $request->investmentID;
        $ir->amount_returned = $request->amount_returned;
        if($ir->save() && $inv->save()){
          return back();
        }
    }


    public function viewAll(){
      $investments = Investment::where('completed', '1')->get()->sortBy(function($useritem, $key) {
          return $useritem->user->lname;
        });
      return view('all-completed-investments', compact('investments'));
    }

    public function viewAllByUser(){
      $investments = InvestmentReturn::where('user_id', Auth::user()->id)->get();
      return view('all-my-completed-investments', compact('investments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvestmentReturn  $investmentReturn
     * @return \Illuminate\Http\Response
     */
    public function show(InvestmentReturn $investmentReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvestmentReturn  $investmentReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(InvestmentReturn $investmentReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvestmentReturn  $investmentReturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $inv = InvestmentReturn::find($request->returnID);
        $inv->amount_returned = $request->amount_returned;
        if($inv->save()){
          return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvestmentReturn  $investmentReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvestmentReturn $investmentReturn)
    {
        //
    }
}
