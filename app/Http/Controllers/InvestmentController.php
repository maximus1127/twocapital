<?php

namespace App\Http\Controllers;

use App\Investment;
use App\Listing;
use App\User;
use Mail;
use Auth;
use App\Mail\InvestmentSubmitted;
use App\Mail\NewInvestmentReceived;
use Illuminate\Http\Request;
use Tjphippen\Docusign\Facades\Docusign;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InvestmentsExport;

class InvestmentController extends Controller
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
        $listings = Listing::where('active', 'Active')->get();
        $users = User::where('role', 'investor')->orderBy('lname')->get();
        return view('investments/new-investment')->with(compact('listings', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $listing = Listing::find($id);
        return view('users/property-investment')->with(compact('listing'));
    }

    public function autoFill($id){
      $investment = Investment::find($id);
      return view('investments/new-investment-from-notes')->with(compact('investment'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $investment = Investment::find($request->investment);
          $investment->investment_completed = 1;
          if($investment->save()){
            Mail::to($investment->user->email)->send(new InvestmentSubmitted());
            return ('good');
          } else {
            return ('bad');
          }
      }


    public function sendInvestment(Request $request){
      $investment = new Investment();
      $investment->user_id = $request->investor;
      $investment->listing_id = $request->listing;
      $investment->amount_invested = $request->investment;
      $investment->shares = $request->shares;
      $investment->ach = encrypt($request->ach);
      $investment->routing = encrypt($request->routing);
      $investment->account_type = $request->account_type;
      $investment->account_name = $request->account_name;
      $investment->bank_name = $request->bank_name;
      $investment->bank_location = $request->bank_location;
      $listing = Listing::find($request->listing);
      $listing->remaining_shares -= $request->shares;
      if($listing->remaining_shares == 0){
        $listing->active = 'Inactive';
      }
      $listing->current_raise += $request->investment;

      if($investment->save() && $listing->save()){
        Mail::to($investment->user->email)->send(new NewInvestmentReceived());
        // Docusign::createEnvelope(array(
        //  'templateId'     => '41ba16d1-eb31-41e6-b975-99fe4290f873', // Template ID
        //  'emailSubject'   => 'Demo Envelope Subject', // Subject of email sent to all recipients
        //  'status'         => 'sent', // created = draft ('sent' will send the envelope!)
        //  'templateRoles'  => array(
        //       ['name'     => $investment->user->fname,
        //        'email'    => $investment->user->email,
        //        'roleName' => 'Investor'],
        //      )
        //
        //   ));
        return back()->with('success', 'Investment Requested Successfully');
      } else {
        return back()->with('error', 'Could not request investment');
      }



    }

    public function cancel($id){
      $investment = Investment::find($id);
      $listing = Listing::find($investment->listing_id);

      $listing->remaining_shares += $investment->shares;
      if($listing->remaining_shares > 0){
        $listing->active = 'Active';
      }
      $listing->current_raise -= $investment->amount_invested;

      $investment->investment_completed = 2;

      if($investment->save() && $listing->save()){
        return back()->with('success', 'Investment Deleted Successfully');
      } else {
        return back()->with('error', 'Could not process request');
      }

    }


    public function viewAllActive(){
      $raw_investments = Investment::where('completed', 0)
                                  ->where('investment_completed', 1)->get();


      $investments = $raw_investments->unique('listing_id');
      return view('active-investment-layout-full')->with(compact('investments', 'raw_investments'));
    }

    public function viewListingActive($id){
      $investments = Investment::where('listing_id', $id)
                                ->where('completed', 0)
                                ->where('investment_completed', 1)->get();

      return view('investment-investor-list')->with(compact('investments'));
    }



    public function viewAllComplete(){
      $investments = Investment::where('completed', 1)->get();
      return view('investments/completed-investments')->with(compact('investments'));
    }
    public function viewPending(){
      $raw_investments = Investment::where('completed', 0)
                                  ->where('investment_completed', 0)->get();


      $investments = $raw_investments->unique('listing_id');
      return view('pending-investment-layout-full')->with(compact('investments', 'raw_investments'));
    }
    public function showListingPending($id){
      $investments = Investment::where('listing_id', $id)
                                ->where('investment_completed', 0)->get();

      return view('investment-investor-list')->with(compact('investments'));
    }


    public function exportInvestments($id){

        return Excel::download(new InvestmentsExport($id), 'investments.csv');

    }

    public function viewMyActive(){
      $active_investments = Investment::where('user_id', Auth::user()->id)
                                ->where('investment_completed', '1')
                                ->where('completed', '0')->get();
      $pending_investments = Investment::where('user_id', Auth::user()->id)
                                        ->where('investment_completed', '0')
                                        ->where('completed', '0')->get();
      $completed_investments = Investment::where('user_id', Auth::user()->id)
                                        ->where('investment_completed', '1')
                                        ->where('completed', '1')->get();

      $user = Auth::user();
      return view('my-property')->with(compact('active_investments', 'pending_investments', 'completed_investments', 'user'));
    }

    public function viewInvestorProperties($id){
      $active_investments = Investment::where('user_id', $id)
                                ->where('investment_completed', '1')
                                ->where('completed', '0')->get();
      $pending_investments = Investment::where('user_id', $id)
                                        ->where('investment_completed', '0')
                                        ->where('completed', '0')->get();
      $completed_investments = Investment::where('user_id', $id)
                                        ->where('investment_completed', '1')
                                        ->where('completed', '1')->get();

      $user = User::find($id);
      return view('my-property')->with(compact('active_investments', 'pending_investments', 'completed_investments', 'user'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function show(Investment $investment)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function edit(Investment $investment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investment $investment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investment $investment)
    {
        //
    }


    public function test(){
      Docusign::createEnvelope(array(
       'templateId'     => '41ba16d1-eb31-41e6-b975-99fe4290f873', // Template ID
       'emailSubject'   => 'Demo Envelope Subject', // Subject of email sent to all recipients
       'status'         => 'sent', // created = draft ('sent' will send the envelope!)
       'templateRoles'  => array(
            ['name'     => 'MB1',
             'email'    => 'linesixmaniac@gmail.com',
             'roleName' => 'Contractor'],
           )

        ));
    }
}
