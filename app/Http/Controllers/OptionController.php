<?php

namespace App\Http\Controllers;

use App\Option;
use App\Poll;
use App\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::all();
        return view('option.index',compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('option.create');
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
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        return view('option.show',compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        return view('option.edit',compact('option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }

    public function usersPoll($id)
    {
        $poll = Poll::query()->find($id);
        $options = Option::query()->where('poll_id',$id)->with('votes')
            ->withCount('votes')->orderBy('votes_count','desc')->get();
        //$options = Option::query()->where('poll_id',$id)->withCount('votes')->orderBy('votes_count','desc')->get();

        $receivedVoteOptionId = null;
        foreach($options as $option){
            foreach ($option->votes as $vote){
                if (Auth::id()==$vote->user_id){
                    $receivedVoteOptionId = $option->id;
                }
            }
        }
        return view('option.votings',compact('options','poll','receivedVoteOptionId'));
    }


    public function voteUp(Request $request, $id){

        // Retrieve the current vote
        $currentOption = $request->currentOption;
        $option = Option::query()->find($currentOption);
        $vote = $option->votes()->where('user_id',Auth::id())->first();


        // Delete the current vote
        /*$vote->delete();
        return "Successfully Deleted";*/

        // Or just update the current vote
        $vote->update(['votable_id'=>$id]);
        return redirect()->back();


        // Create the new vote if not already present
        /*$user = Auth::User();
        $option = Option::query()->find($id);
        $option->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);
        return redirect()->back();*/

    }
}
