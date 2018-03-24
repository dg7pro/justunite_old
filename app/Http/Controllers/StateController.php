<?php

namespace App\Http\Controllers;


use App\State;
use App\Party;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
        $states = State::query()->where('stype_id','=',1)->withCount('constituencies')->get();
        $uts = State::query()->where('stype_id','=',2)->withCount('constituencies')->get();

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
    public function show($id)
    {
        //$constituencies = Constituency::where('state_id','=',$state->id)->get();
        //$parties = $state->parties()->get();
        $state = State::where('id','=',$id)->with('languages')->first();
        return view('state.show',compact('state','constituencies','parties'));
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
        $this->validator($request->all())->validate();
        $state->update($request->all());
        //Flash Message
        Session::flash('message', 'State updated successfully!');
        return back();
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name2'=>'required',
            'literacy' => 'required',
            'language' => 'required',
            'capital' => 'required',

            'prank' => 'required',
            'population' => 'required',
            'urbanp' => 'required',
            'ruralp' => 'required',
            'density' => 'required',
            'sex_ratio' => 'required',

            'pc' => 'required',
            'ac' => 'required',
            'governor' => 'required',
            'cm' => 'required',
            'wparty' => 'required'
        ]);
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function stateAjax($id)
    {
        $constituencies = DB::table("constituencies")
            ->where("state_id",$id)
            ->pluck("pc_name","id")->all();
        return json_encode($constituencies);
    }


    public function stateWithConstituencies($id){

        $state = State::query()->where('id','=',$id)->with('constituencies')->first();
        //return $state;
        return view('state.constituencies',compact('state'));

    }

    public function listParties(State $state){

        $active_parties = $state->parties()->pluck('id')->toArray();

        //return $active_parties;
        $parties = Party::all();
        return view('state.parties',compact('parties','state','active_parties'));
    }

    public function attachParties(Request $request, State $state){

        $parties_id = $request->parties_id;
        $state->parties()->sync($parties_id);
        return redirect()->back();
        //return $request->parties_id;
    }

    public function members($id){

        $members = User::all()->count();
        $state = State::find($id);
        return view('state.members',compact('members','state'));

        /* $state = State::find($id);
        $users = User::query()->where('state_id',$id)
            ->has('votes')->withCount('votes')->with('votes')->orderBy('votes_count','desc')->get();
        return view('state.users',compact('users','state'));*/


    }

    public function yourState(){

        if(Auth::user()->state_id == null){
            Session::flash('message', 'Please select your State & Constituency !');
            return redirect('/home');
            //return "Please select your Constituency";
        }
        else{
            return redirect('states/'.Auth::user()->state_id);
            //return "Redirect to other";
        }
    }
}
