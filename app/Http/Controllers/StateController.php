<?php

namespace App\Http\Controllers;


use App\State;
use App\Party;
use App\User;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    /**
     * StateController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->except('index','show','capitals','literacy','populations','cm','governor','rulingParty','gdp','seats','stateAjax');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        //$this->authorize('manage_site');

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
        $stateCount = State::all()->count();
        $states = State::all();
        $state = State::where('id','=',$id)->with('languages','ruling','opposition')->first();
        return view('state.show',compact('state','constituencies','parties','states','stateCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $parties = Party::where('ptype_id','<=',2)->get();
        return view('state.edit',compact('state','parties'));
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
     * Get Ajax Request and return Data
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

    public function listLanguages(State $state){

        $active_languages = $state->languages()->pluck('id')->toArray();

        //return $active_parties;
        $languages = Language::all();
        return view('state.languages',compact('languages','state','active_languages'));
    }

    public function attachLanguages(Request $request, State $state){

        $languages_id = $request->languages_id;
        $state->languages()->sync($languages_id);
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

    public function capitals(){

        $states = State::select('id','name','capital')->get();
        return view('state.capitals', compact('states'));
        //return $states;
    }

    public function literacy(){

        $states = State::select('id','name','literacy')->orderBy('literacy','desc')->get();
        return view('state.literacy', compact('states'));
        //return $states;
    }

    public function populations(){

        $states = State::select('id','name','population','rank','upo','rpo','density','sex_ratio')->get();
        return view('state.populations', compact('states'));
        //return $states;

    }

    public function cm(){

        $states = State::select('id','name','cm')->get();
        return view('state.cm', compact('states'));
        //return $states;
    }

    public function governor(){

        $states = State::select('id','name','governor')->get();
        return view('state.governor', compact('states'));
        //return $states;
    }

    public function rulingParty(){


        $states = State::with('ruling','opposition')->get();
        return view('state.ruling', compact('states'));
        //return $states;
        //dd($states);
    }

    public function gdp(){

        $states = State::select('id','name','gdp','income')->get();
        return view('state.gdp', compact('states'));
        //return $states;
    }

    public function seats(){

        $states = State::select('id','name','pc','ac')->get();
        return view('state.seats', compact('states'));
        //return $states;
    }


}
