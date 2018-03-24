<?php

namespace App\Http\Controllers;

use App\Marital;
use Illuminate\Http\Request;

class MaritalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maritals = Marital::all();
        return view('marital.index',compact('maritals'));
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
     * @param  \App\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function show(Marital $marital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function edit(Marital $marital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marital $marital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marital $marital)
    {
        //
    }
}
