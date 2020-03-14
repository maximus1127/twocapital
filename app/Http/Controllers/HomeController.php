<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Listing;
use App\AdminPost;
use App\Investment;
use Mail;
use App\Mail\ContactForm;
use App\Mail\NewRegistration;
use App\InvestmentReturn;
use App\Update;
use App\Message;
use Auth;
use App\Media;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['spaContact', 'spaMedia']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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
        foreach ($investmentss as $i) {
            if ($i->completed == 1 && $i->investment_completed != 2) {
                $completed_dollars += $i->amount_invested;
            }
        }
        foreach ($investmentss as $i) {
            if ($i->completed == 0 && $i->investment_completed != 2) {
                $active_dollars += $i->amount_invested;
            }
        }

        $returns = InvestmentReturn::where('user_id', Auth::user()->id)->get();
        foreach ($returns as $r) {
            $earned_dollars += $r->amount_returned;
        }


        $og_listings = Listing::where('active', 'Active')->get();


        $listings =collect();
        $all_inv = Investment::where('user_id', Auth::user()->id)->where('investment_completed', '!=', 2)->pluck('listing_id')->toArray();


        foreach ($og_listings as $inv) {
            if (!in_array($inv->id, $all_inv)) {
                $listings->push($inv);
            }
        }

        $filtered_investments = Investment::where('user_id', Auth::user()->id)->where('investment_completed', '!=', 2)->get();
        $investments = $filtered_investments->unique('listing_id');


        $funded_listings= Listing::where('remaining_shares', '0')->orWhere('active', 'Funded')->get();


        foreach ($funded_listings as $fl) {
            $first_investment = Investment::where('listing_id', $fl->id)
                                       ->where('investment_completed', '!=', '2')->first();
            $last_investment = Investment::where('listing_id', $fl->id)
                                        ->where('investment_completed', '!=', '2')->latest()->first();
            $elapsed = $fl->funded($last_investment->created_at, $first_investment->created_at);

            $fl->elapsed = $elapsed;
        }


        $messages_raw = Message::orderBy('id', 'desc')->take(100)->get();
        $messages = $messages_raw->reverse();

        return view('map')->with(compact('listings', 'investments', 'og_listings', 'funded_listings', 'messages', 'completed_dollars', 'active_dollars', 'investments', 'earned_dollars', 'completed_projects', 'active_projects'));
    }


    public function cancel()
    {
        return view('cancel');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContactForm(Request $request)
    {
        $user = Auth::user()->fname.' '.Auth::user()->lname;
        $email = Auth::user()->email;

        $message = $request->message;
        Mail::to('saltcapitalequitygroup@gmail.com')->send(new ContactForm($user, $email, $message));
        return back()->with('success', 'Your message has been delivered');
    }

    public function spaContact(Request $request)
    {
        // $sendTo = ['linesixmaniac@gmail.com', 'maxbourque1127@yahoo.com', 'arcvoice337@gmail.com'];
        $sendTo = ['members@saltcapitalequitygroup.com', 'Justin@saltcapitalequitygroup.com', 'terrica@saltcapitalequitygroup.com', 'derik@saltcapitalequitygroup.com', 'saltcapitalequitygroup@gmail.com'];
        $user = $request->fname.' '.$request->lname;
        $email = $request->email;
        $message = $request->content;
        $permission = $request->permission;

        Mail::to($sendTo)->send(new ContactForm($user, $email, $message, $permission));

        return back()->with('success', 'Your message has been delivered');
    }
}
