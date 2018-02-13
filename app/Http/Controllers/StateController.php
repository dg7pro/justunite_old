<?php

namespace App\Http\Controllers;

use App\State;
use App\User;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$states = State::all();
        $states = State::query()->where('type','=',1)->withCount('constituencies')->get();
        $uts = State::query()->where('type','=',2)->withCount('constituencies')->get();

        return view('state.index',compact('states','uts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('state.create');
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
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        return view('state.show',compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view('state.edit',compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }

    public function users($id){

        $state = State::find($id);
        $users = User::query()->where('state_id',$id)
            ->has('votes')->withCount('votes')->with('votes')->orderBy('votes_count','desc')->get();
        return view('state.users',compact('users','state'));


    }

    public function stateWithConstituencies($id){

        $state = State::query()->where('id','=',$id)->with('constituencies')->first();
        //return $state;
        return view('state.constituencies',compact('state'));

    }
}
