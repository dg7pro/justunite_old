<?php

namespace App\Http\Controllers;

use App\Ctype;
use Illuminate\Http\Request;

class CtypeController extends Controller
{
    /**
     * CtypeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('manage_site');

        $ctypes = Ctype::all();
        return view('ctype.index',compact('ctypes'));
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
     * @param  \App\Ctype  $ctype
     * @return \Illuminate\Http\Response
     */
    public function show(Ctype $ctype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ctype  $ctype
     * @return \Illuminate\Http\Response
     */
    public function edit(Ctype $ctype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ctype  $ctype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ctype $ctype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ctype  $ctype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ctype $ctype)
    {
        //
    }
}
