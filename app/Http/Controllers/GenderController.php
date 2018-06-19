<?php

namespace App\Http\Controllers;

use App\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GenderController extends Controller
{
    /**
     * GenderController constructor.
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

        $genders = Gender::all();
        return view('gender.index',compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('manage_site');
        return view('gender.create');
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

        // Add New Age Group
        $gender = new Gender();
        $gender->name = $request->name;
        $gender->save();

        //Flash Message
        Session::flash('message', 'Gender created successfully!');

        // Redirect Back
        return redirect('genders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Gender $gender)
    {
        $this->authorize('manage_site');
        return view('gender.show',compact('gender'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function edit(Gender $gender)
    {
        $this->authorize('manage_site');
        return view('gender.edit',compact('gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gender $gender)
    {
        $this->authorize('manage_site');

        // Validate Inputs
        $this->validator($request->all())->validate();

        // Update Age Group
        $gender->name = $request->name;
        $gender->update();

        //Flash Message
        Session::flash('message', 'Gender updated successfully!');

        // Redirect Back
        return redirect('genders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gender $gender)
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
