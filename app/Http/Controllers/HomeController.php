<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth')->except('newPage','design','index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome2');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

    public function newPage()
    {
        return view('new');
    }

    public function design()
    {
        return view('design');
    }

    public function map()
    {
        return view('map');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function admin()
    {
        /*if(Gate::denies('manage_site')){
            abort('403','Sorry not sorry!');
        }*/
        // Or authorize function does the same thing.
        $this->authorize('manage_site');
        return view('admin.index');
    }

}
