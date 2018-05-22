<?php

namespace App\Http\Controllers;

use App\Image;
use App\Problem;
Use App\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProblemController extends Controller
{
    /**
     * ProblemController constructor.
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
        $problems = Problem::with('votes')->withCount('votes')
            ->orderBy('votes_count','desc')->get();

        $receivedVoteProblemId = null;
        foreach($problems as $problem){
            foreach ($problem->votes as $vote){
                if (Auth::id()==$vote->user_id){
                    $receivedVoteProblemId = $problem->id;
                }
            }
        }
        $states = State::all();

        return view('problem.index2',compact('problems','receivedVoteProblemId','states'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('manage_site');
        return view('problem.create');
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

        $problem = new Problem();
        $problem->title = $request->title;
        $problem->image = $request->image;
        $problem->notes = $request->notes;
        $problem->save();

        //Flash Message
        Session::flash('message', 'Course added successfully!');

        // Redirect Back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Problem $problem)
    {
        $problemCount = Problem::all()->count();
        $images = $problem->images()->get();
        return view('problem.show',compact('problem','images','problemCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function edit(Problem $problem)
    {
        $this->authorize('manage_site');
        return view('problem.edit',compact('problem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problem $problem)
    {
        $this->authorize('manage_site');
        $this->validator($request->all())->validate();
        $problem->update($request->all());
        //Flash Message
        Session::flash('message', 'Problem updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem $problem)
    {
        $this->authorize('manage_site');
        $problem->delete();
        return redirect('problems');
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
            'title'=>'required',
            'notes' => 'required',
        ]);
    }

    public function ajaxVote(Request $request, $id){

        // Retrieve the current vote
        //$newOption = $request->newOption;
        $currentOption = $request->currentOption;

        //return response()->json(['co'=>$currentOption,'newo'=>$id]);

        if($currentOption==null){
            $user = Auth::User();
            $u = Problem::query()->find($id);
            $u->votes()->create(['user_id'=>$user->id]);
            //return redirect()->back();
            return response()->json(['message'=>'You have successfully voted','id'=>$id]);

        }else {
            $u = Problem::query()->find($currentOption);
            $vote = $u->votes()->where('user_id', Auth::id())->first();
            $vote->update(['votable_id' => $id]);
            //return redirect()->back();
            return response()->json(['message'=>'You have successfully voted','id'=>$id]);
        }
    }


    public function vote(Request $request, $id){

        // Retrieve the current vote
        $currentOption = $request->currentOption;
        if($currentOption==null){
            $user = Auth::User();
            $problem = Problem::query()->find($id);
            $problem->votes()->create(['user_id'=>$user->id,'credits'=>$user->credits]);
            return redirect()->back();
        }else {
            $problem = Problem::query()->find($currentOption);
            $vote = $problem->votes()->where('user_id', Auth::id())->first();
            $vote->update(['votable_id' => $id]);
            return redirect()->back();
        }
    }

    public function makeReady(){

        //return redirect()->intended();
        return redirect()->to('problems');
        //return redirect()->back();

    }

    public function uploadImage(Problem $problem, Request $request){

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

        $problem->images()->save($image);
        return redirect()->back();

    }
}
