<?php

namespace App\Http\Controllers;

use App\Image;
use App\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PartyController extends Controller
{
    /**
     * PartyController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show','voting');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $parties = Party::with('votes')->withCount('votes')
            ->orderBy('votes_count','desc')->get();

       /* $national_parties = Party::with('votes')->where('ptype_id','=',1)->withCount('votes')
            ->orderBy('votes_count','desc')->get();

        $state_parties = Party::with('votes')->where('ptype_id','=',2)->withCount('votes')
            ->orderBy('votes_count','desc')->get();*/

        $national_parties = Party::with('votes')->where('ptype_id','=',1)->withCount('votes')->get();
        $state_parties = Party::with('votes')->where('ptype_id','=',2)->withCount('votes')->get();

        $receivedVotePartyId = null;
        foreach($parties as $party){
            foreach ($party->votes as $vote){
                if (Auth::id()==$vote->user_id){
                    $receivedVotePartyId = $party->id;
                }
            }
        }

        //return $problems;
        return view('party.index',compact('national_parties','state_parties','receivedVotePartyId'));

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
        $partyCount = Party::all()->count();
        $images = $party->images()->get();
        return view('party.show',compact('party','images','partyCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Party $party)
    {
        $this->authorize('manage_site');
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
        $this->validator($request->all())->validate();
        $party->update($request->all());
        //Flash Message
        Session::flash('message', 'Party updated successfully!');
        return back();
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


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'abbreviation' => 'required',
            'symbol' => 'required',

            'founder' => 'required',
            'president' => 'required',
            'leadership' => 'required',

            'details' => 'required',

        ]);
    }

    public function voteParty(Request $request){

        $id = $request->partyid;
        $cid = $request->currentid;

        // Retrieve the current vote
        // $currentOption = $request->currentOption;
        if($cid==null){
            $user = Auth::User();
            $party = Party::query()->find($id);
            $party->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);

            return response()->json(['message' => 'You have successfully voted ','color'=>'green','id' => $id,'cid'=>$cid, 'safalta'=>true]);
            //return redirect()->back();
        }else {
            $party = Party::query()->find($cid);
            $vote = $party->votes()->where('user_id', Auth::id())->first();
            $vote->update(['votable_id' => $id]);
            return response()->json(['message' => 'You have successfully voted ','color'=>'green','id' => $id,'cid'=>$cid, 'safalta'=>true]);
            //return redirect()->back();
        }

        //return response()->json(['message' => 'You have successfully voted ','color'=>'green','id' => $id,'cid'=>$cid, 'safalta'=>true]);
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


    public function ajaxVote(Request $request, $id){

        // Retrieve the current vote
        //$newOption = $request->newOption;
        $currentOption = $request->currentOption;

        if($currentOption==null){
            $user = Auth::User();
            $u = Party::query()->find($id);
            $u->votes()->create(['user_id'=>$user->id]);
            //return redirect()->back();
            return response()->json(['message'=>'You have successfully voted','id'=>$id]);

        }else {
            $u = Party::query()->find($currentOption);
            $vote = $u->votes()->where('user_id', Auth::id())->first();
            $vote->update(['votable_id' => $id]);
            //return redirect()->back();
            return response()->json(['message'=>'You have successfully voted','id'=>$id]);
        }
    }

    public function makeReady(){

        //return redirect()->intended();
        return redirect()->to('parties');
        //return redirect()->back();

    }

    public function uploadImage(Party $party, Request $request){

        //$file = $request->file('image');
        //return $file->getClientOriginalName();
        //return $file->getClientOriginalExtension();
        //return $file->getClientMimeType();
        //return $file->getClientSize();

        //===========================================

        // Understanding Path is important for JU
        /*$path = $request->file('image')->store('public');
        return $path;*/

        /*$file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $filename  = time() . '.' . $file->getClientOriginalExtension();
        $filename  = time() . '_' . $file->getClientOriginalName();

        $path = $file->storeAs('public/problems',$filename);
        return $path;*/

        //============================================

        // Real Coding Begins

        // Upload & save file to directory
        $file = $request->file('image');
        $filename  = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/',$filename);

        $image = New Image();
        $image->name = $filename;
        $image->heading = $request->heading;
        $image->caption = $request->caption;

        $party->images()->save($image);
        return redirect()->back();

    }
}
