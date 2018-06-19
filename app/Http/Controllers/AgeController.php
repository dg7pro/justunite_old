<?php

namespace App\Http\Controllers;

use App\Age;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AgeController extends Controller
{
    /**
     * AgeController constructor.
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
        $ages = Age::all();
        return view('age.index',compact('ages'));
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
        return view('age.create');
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

        // Add New Age Group
        $age = new Age();
        $age->group = $request->group;
        $age->save();

        //Flash Message
        Session::flash('message', 'Age Group created successfully!');

        // Redirect Back
        return redirect('ages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Age $age)
    {
        $this->authorize('manage_site');
        return view('age.show',compact('age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Age $age)
    {
        $this->authorize('manage_site');
        return view('age.edit',compact('age'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Age $age)
    {
        $this->authorize('manage_site');

        // Validate Inputs
        $this->validator($request->all())->validate();

        // Update Age Group
        $age->group = $request->group;
        $age->update();

        //Flash Message
        Session::flash('message', 'Age Group updated successfully!');

        // Redirect Back
        return redirect('ages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Age $age)
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
            'group' => 'required'
        ]);
    }
}
