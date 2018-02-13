<?php

namespace App\Http\Controllers;

use App\User;
use App\Constituency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ConstituencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $constituencies = Constituency::with('state')->get();
        return view('constituency.index',compact('constituencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('constituency.create');
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
     * @param  \App\Constituency  $constituency
     * @return \Illuminate\Http\Response
     */
    public function show(Constituency $constituency)
    {
        return view('constituency.show',compact('constituency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Constituency  $constituency
     * @return \Illuminate\Http\Response
     */
    public function edit(Constituency $constituency)
    {
        return view('constituency.edit',compact('constituency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Constituency  $constituency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constituency $constituency)
    {
        $this->validator($request->all())->validate();
        $constituency->update($request->all());
        //Flash Message
        Session::flash('message', 'Constituency updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Constituency  $constituency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constituency $constituency)
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
            'pc_name' => 'required',

        ]);
    }


    public function users($id){

        //$users = User::query()->where('constituency_id',$id)->with('votes')->get();
        $constituency = Constituency::find($id);
        $users = User::query()->where('constituency_id',$id)
            ->has('votes')->withCount('votes')->with('votes')->orderBy('votes_count','desc')->get();
        return view('constituency.users',compact('users','constituency'));
    }



}
