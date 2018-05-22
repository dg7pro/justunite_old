<?php

namespace App\Http\Controllers;

use App\Contestant;
use App\User;
use App\State;
use App\Constituency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ConstituencyController extends Controller
{
    /**
     * ConstituencyController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show','voting','track');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $constituencies = Constituency::with('state.stype','ctype')->get();
        $states = State::all();
        return view('constituency.index',compact('constituencies','states'));
        //return $constituencies;

        //$election = Election::where('type','=',1)->latest('year')->first();
        //return $election;

        //$constituencies = Constituency::where('election_id','=',$election->id)->get();

        /*$constituencies = $election->constituencies()->with('state','ctype')->get();
        return view('constituency.index',compact('constituencies'));*/
        //return $constituencies;
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
    public function show($id)
    {
        /*$constituency=Constituency::where('id','=',$id)->first();
        $election = $constituency->elections()->where('election_id','=',1)->first();
        $contestants = $constituency->contestants()->where('election_id','=',1)
            ->with('gender','party')->orderBy('votes','dsc')->get();
        return view('constituency.show',compact('constituency','election','contestants'));*/


        //$constituency = $constituency->load('contestants.gender','election')->first();


        $constituencyCount = Constituency::all()->count();
        $constituency = Constituency::where('id','=',$id)->first();
        //$members = $constituency->members()->withCount('knownBy');

        $members = User::where('constituency_id','=',$id)
            ->withCount('knownBy')
            ->orderBy('known_by_count','desc')->get();

        $contestants = $constituency->contestants()
            ->with('gender','party')
            ->orderBy('votes','dsc')->take(2)->get();

        $states = State::all();


        return view('constituency.show',compact('constituency','contestants','members','states','constituencyCount'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Constituency  $constituency
     * @return \Illuminate\Http\Response
     */
    public function edit(Constituency $constituency)
    {
        //$constituency = Constituency::where('id','=',$id)->with('state')->first();
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
            'details' => 'required'
        ]);
    }

    /**
     * Have to return members of particular constituency
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function members($id){

        $members = User::all()->count();
        $constituency = Constituency::find($id);
        return view('constituency.members',compact('members','constituency'));

        //$users = User::query()->where('constituency_id',$id)->with('votes')->get();
        /*$constituency = Constituency::find($id);
        $users = User::query()->where('constituency_id',$id)
            ->has('votes')->withCount('votes')->with('votes')->orderBy('votes_count','desc')->get();
        return view('constituency.users',compact('users','constituency'));*/
    }

    /**
     * Redirect the user either to fill its constituency or to constituency page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function yourConstituency(){

        if(Auth::user()->constituency_id == null){
            Session::flash('message', 'Please select your Loksabha Constituency !');
            return redirect('/home');
        }
        else{
            return redirect('constituencies/'.Auth::user()->constituency_id);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function track(Request $request){

        //return $request->constituency;

        return $this->show($request->constituency);

    }

    public function contestants($id){

        $constituency = Constituency::find($id);
        $contestants = Contestant::query()->where('constituency_id','=',$constituency->id)->with('gender')->get();

        //return $constituency;



        //$constituency = $constituency->with('contestants.gender')->get();

        return view('constituency.contestants',compact('constituency','contestants'));
    }



}
