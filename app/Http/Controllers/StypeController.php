<?php

namespace App\Http\Controllers;

use App\Stype;
use Illuminate\Http\Request;

class StypeController extends Controller
{
    /**
     * StypeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stype  $stype
     * @return \Illuminate\Http\Response
     */
    public function show(Stype $stype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stype  $stype
     * @return \Illuminate\Http\Response
     */
    public function edit(Stype $stype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stype  $stype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stype $stype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stype  $stype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stype $stype)
    {
        //
    }
}
