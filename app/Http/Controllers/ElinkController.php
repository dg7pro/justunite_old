<?php

namespace App\Http\Controllers;

use App\Elink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ElinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Not Required
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Not Required
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('manage_site');

        // Validate Inputs
        $this->validator($request->all())->validate();

        $elink = new Elink();
        $elink->indian_id = $request->indian_id;
        $elink->link = $request->link;
        $elink->save($request->all());

        //Flash Message
        Session::flash('message', 'External Link added successfully!');

        // Redirect Back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Elink  $elink
     * @return \Illuminate\Http\Response
     */
    public function show(Elink $elink)
    {
        //Not Required
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Elink  $elink
     * @return \Illuminate\Http\Response
     */
    public function edit(Elink $elink)
    {
        $this->authorize('manage_site');
        return view('elink.edit',compact('elink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Elink  $elink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Elink $elink)
    {
        $this->authorize('manage_site');
        $this->validator($request->all())->validate();
        $elink->update($request->all());
        //Flash Message
        Session::flash('message', 'External Link updated successfully!');
        return redirect('indians/'.$elink->indian_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Elink  $elink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Elink $elink)
    {
        $this->authorize('manage_site');
        $elink->delete();
        return redirect()->back();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'indian_id'=>'required',
            'link' => 'required',
        ]);
    }
}
