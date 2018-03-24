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
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
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
        //$this->middleware('auth')->except('newPage','design','index','faq','newLogin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::query()->where('page','=','Frontpage')->get();
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
        $constituency = Auth::User()->constituency()->first();

        //Flash Message
        //Session::flash('message', 'Please complete your Profile !');
        return view('home2',compact('states','religions','ages','educations','professions','maritals','genders','groups','constituency'));
    }

    public function newPage()
    {
        //return view('new');
        return view('auth.one');
    }

    public function newLogin()
    {
        return view('newlogin');
    }

    public function design()
    {
        return view('design');
    }

    public function map()
    {
        return view('map');
    }

    public function faq(){

        return view('faq');
    }

}
