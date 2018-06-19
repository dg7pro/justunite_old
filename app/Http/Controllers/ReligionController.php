<?php

namespace App\Http\Controllers;

use App\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReligionController extends Controller
{
    /**
     * ReligionController constructor.
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
        $religions = Religion::all();
        return view('religion.index',compact('religions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('manage_site');
        return view('religion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('manage_site');

        // Validate Inputs
        $this->validator($request->all())->validate();

        // Add New Religion
        $religion = new Religion();
        $religion->name = $request->name;
        $religion->save();

        //Flash Message
        Session::flash('message', 'Religion created successfully!');

        // Redirect Back
        return redirect('religions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Religion  $religion
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Religion $religion)
    {
        $this->authorize('manage_site');
        return view('religion.show',compact('religion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Religion  $religion
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Religion $religion)
    {
        $this->authorize('manage_site');
        return view('religion.edit',compact('religion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Religion  $religion
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Religion $religion)
    {
        $this->authorize('manage_site');

        // Validate Inputs
        $this->validator($request->all())->validate();

        // Update Religion
        $religion->name = $request->name;
        $religion->update();

        //Flash Message
        Session::flash('message', 'Religion updated successfully!');

        // Redirect Back
        return redirect('religions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Religion  $religion
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Religion $religion)
    {
        $this->authorize('manage_site');

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
            'name' => 'required'
        ]);
    }
}
