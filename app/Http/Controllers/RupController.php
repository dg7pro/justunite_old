<?php

namespace App\Http\Controllers;

use App\Rup;
use Illuminate\Http\Request;

class RupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       /* $rups = Rup::all();
        return view('rup.index',compact('rups'));*/

        $rups=Rup::paginate(10);
        $html='';
        foreach ($rups as $rup) {
            $html.='<li>'.$rup->id.' <strong>'.$rup->name.'</strong> : '.'<br>'.$rup->headquarter.'</li>';
        }
        if ($request->ajax()) {
            return $html;
        }
        return view('rup.index',compact('rups'));
    }

    public function indexPaginate(){

        $rups=Rup::paginate(10);
        return view('rup.index-paginate', ['rups' => $rups]);

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
     * @param  \App\Rup  $rup
     * @return \Illuminate\Http\Response
     */
    public function show(Rup $rup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rup  $rup
     * @return \Illuminate\Http\Response
     */
    public function edit(Rup $rup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rup  $rup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rup $rup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rup  $rup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rup $rup)
    {
        //
    }
}
