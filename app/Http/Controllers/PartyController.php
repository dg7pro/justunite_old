<?php

namespace App\Http\Controllers;

use App\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Party::with('votes')->withCount('votes')
            ->orderBy('votes_count','desc')->get();

        $receivedVotePartyId = null;
        foreach($parties as $party){
            foreach ($party->votes as $vote){
                if (Auth::id()==$vote->user_id){
                    $receivedVotePartyId = $party->id;
                }
            }
        }

        //return $problems;
        return view('party.index',compact('parties','receivedVotePartyId'));

        /*$parties = Party::all();
        return view('party.index',compact('parties'));*/
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
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        return view('party.show',compact('party'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Party $party)
    {
        return view('party.edit',compact('party'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        //
    }

    public function vote(Request $request, $id){

        // Retrieve the current vote
        $currentOption = $request->currentOption;

        if($currentOption){

            $party = Party::query()->find($currentOption);
            $vote = $party->votes()->where('user_id',Auth::id())->first();
            $vote->update(['votable_id'=>$id]);
            return redirect()->back();

        }else{

            $user = Auth::User();
            $party = Party::query()->find($id);
            $party->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);
            return redirect()->back();
        }





        // Create the new vote if not already present
        /*$user = Auth::User();
        $option = Option::query()->find($id);
        $option->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);
        return redirect()->back();*/

    }

    public function makeReady(){

        //return redirect()->intended();
        return redirect()->to('problems');
        //return redirect()->back();

    }
}
