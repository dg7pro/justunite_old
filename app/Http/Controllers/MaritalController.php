<?php

namespace App\Http\Controllers;

use App\Marital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MaritalController extends Controller
{
    /**
     * MaritalController constructor.
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
        $this->authorize('manage_site');
        return view('marital.create');
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

        // Add
        $marital = new Marital();
        $marital->status = $request->status;
        $marital->save();

        //Flash Message
        Session::flash('message', 'Marital Status created successfully!');

        // Redirect Back
        return redirect('maritals');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function show(Marital $marital)
    {
        $this->authorize('manage_site');
        return view('age.show',compact('age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function edit(Marital $marital)
    {
        $this->authorize('manage_site');
        return view('marital.edit',compact('marital'));
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
        $this->authorize('manage_site');

        // Validate Inputs
        $this->validator($request->all())->validate();

        // Update Age Group
        $marital->status = $request->status;
        $marital->update();

        //Flash Message
        Session::flash('message', 'Age Group updated successfully!');

        // Redirect Back
        return redirect('maritals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marital $marital)
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
            'status' => 'required'
        ]);
    }
}
