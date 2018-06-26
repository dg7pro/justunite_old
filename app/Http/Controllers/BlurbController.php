<?php

namespace App\Http\Controllers;

use App\Blurb;
use App\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlurbController extends Controller
{
    /**
     * BlurbController constructor.
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
        $blurbs = Blurb::all();
        $states = State::all();
        return view('blurb.index',compact('blurbs','states'));
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
     * @param  \App\Blurb  $blurb
     * @return \Illuminate\Http\Response
     */
    public function show(Blurb $blurb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blurb  $blurb
     * @return \Illuminate\Http\Response
     */
    public function edit(Blurb $blurb)
    {
        $states = State::all();
        $locations = $blurb->constituencies()->with('state')->get();
        return view('blurb.edit',compact('blurb','states','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blurb  $blurb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blurb $blurb)
    {
        $this->authorize('manage_site');

        if($request->file()){

            Storage::delete('public/blurb/'.$blurb->image);

            $file = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $file->storeAs('public/blurb/',$filename);

            $blurb->image = $filename;
            $blurb->name = $request->name;
            $blurb->link = $request->link;
            $blurb->type = $request->type;
            $blurb->update();

        }else {

           $blurb->name = $request->name;
           $blurb->link = $request->link;
           $blurb->type = $request->type;
           $blurb->update();
        }

        //Flash Message
        Session::flash('message', 'Blurb updated successfully!');

        // Redirect Back
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blurb  $blurb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blurb $blurb)
    {
        //
    }


    public function uploadImage(Request $request){

        // Upload & save file to directory
        $file = $request->file('image');
        $filename  = $file->getClientOriginalName();
        $file->storeAs('public/blurb/',$filename);

        $conId = $request->constituency;

        $blurb = New Blurb();
        $blurb->name = $request->name;
        $blurb->image = $filename;
        $blurb->link = $request->link;
        $blurb->type = $request->type;
        $blurb->start = Carbon::today();
        $blurb->end = Carbon::today()->addDays('365');

        $blurb->save();
        $blurb->constituencies()->attach($conId);
        //return $blurb;
        return redirect()->back();
    }

    public function blurbConstituencies($id){

        $blurb = Blurb::query()->where('id','=',$id)->with('constituencies.state')->first();
        $states = State::all();
        //return $blurb;
        return view('blurb.constituencies',compact('blurb','constituencies','states'));
    }



    public function attachConstituency(Request $request, Blurb $blurb){

        $conId = $request->constituency;
        $blurb->constituencies()->attach($conId);
        return redirect()->back();
        //return $request->parties_id;
    }
}
