<?php

namespace App\Http\Controllers;

use App\Age;
use App\Content;
use App\Education;
use App\Gender;
use App\Group;
use App\Marital;
use App\Profession;
use App\Religion;
use App\State;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','faq','privacyPolicy','loksabhaElection2019','loksabhaElection','greatestIndiansEver');
    }

    /**
     * Show the index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::query()->where('page','=','Frontpage')->orderBy('id','desc')->get();
        return view('welcome',compact('contents'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $states = State::all();
        $religions = Religion::all();
        $ages = Age::all();
        $educations = Education::all();
        $professions = Profession::all();
        $maritals = Marital::all();
        $genders = Gender::all();
        $groups = Group::all();
        $constituency = Auth::User()->constituency()->with('state')->first();

        //Flash Message
        //Session::flash('message', 'Please complete your Profile !');
        return view('home',compact('states','religions','ages','educations','professions','maritals','genders','groups','constituency'));
    }

    /**
     * Show the application faq.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq(){

        return view('faq2');
    }

    public function privacyPolicy(){

        return view('privacy-policy');

    }

    public function loginToContinue(Request $request){

        $lastUrl = $request->session()->get('lastUrl');
        $request->session()->forget('lastUrl');
        return redirect($lastUrl);
    }

    public function cancel(){

        return back();

    }

    public function loksabhaElection2019(){

        //$contents = Content::query()->where('page','=','electionpage')->orderBy('id','desc')->get();
        $hiContent = Content::query()->where([
            ['page','=','electionpage'],
            ['slug','=','hindi']
        ])->first();

        $engContent = Content::query()->where([
            ['page','=','electionpage'],
            ['slug','=','english']
        ])->first();
        return view('election-2019',compact('hiContent','engContent'));
    }

    public function loksabhaElection(){

        //$contents = Content::query()->where('page','=','electionpage')->orderBy('id','desc')->get();
        $hiContent = Content::query()->where([
            ['page','=','electionpage'],
            ['slug','=','hindi']
        ])->first();

        $engContent = Content::query()->where([
            ['page','=','electionpage'],
            ['slug','=','english']
        ])->first();
        return view('election',compact('hiContent','engContent'));
    }

    public function letterToCandidates(){

        $hiContent = Content::query()->where([
            ['page','=','letterpage'],
            ['slug','=','hindi']
        ])->first();

        return view('letter-to-candidates',compact('hiContent'));
    }

    public function greatestIndiansEver(){

        return view('indians');
    }





}
