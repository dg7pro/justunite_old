<?php

namespace App\Http\Controllers;

use App\Add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AddController extends Controller
{
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
        $add = Auth::user()->add()->first();
        if($add){
            return $this->edit($add);
        }else {
            return view('add.create');
        }
        //return ($add) ? $this->edit($add): view('add.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Inputs
        $this->validator($request->all())->validate();

        // Add New Course
        $add = new Add();
        $add->user_id = Auth()->id();
        $add->matter = $request->matter;
        $add->active = isset($request['active']);
        $add->save();

        //Flash Message
        Session::flash('message', 'Your advertisement has been submitted for review successfully!');

        // Redirect Back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function show(Add $add)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function edit(Add $add)
    {
        return view('add.edit',compact('add'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Add $add)
    {
        $this->validator($request->all())->validate();

        $add->matter = $request->matter;
        $add->active = isset($request['active']);
        $add->update();

        //Flash Message
        Session::flash('message', 'Add updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function destroy(Add $add)
    {
        //
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
            'matter' => 'required|string',
        ]);
    }
}
