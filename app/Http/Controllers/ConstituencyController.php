<?php

namespace App\Http\Controllers;

use App\Contestant;
use App\Office;
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
        $this->middleware('auth')->except('index','show','voting','track','contestants');
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

        /*$members = User::where('constituency_id','=',$id)
            ->withCount('knownBy')
            ->orderBy('known_by_count','desc')->get();*/

        $members = User::where([['constituency_id','=',$id],['invisible','=',0]])
            ->withCount('knownBy')
            ->orderBy('known_by_count','desc')->get();

        $memCount = $members->count();

        $contestants = $constituency->contestants()
            ->with('gender','party')
            ->orderBy('votes','dsc')->take(2)->get();

        $states = State::all();

        return view('constituency.show',compact('constituency','contestants','members','states','constituencyCount','memCount'));

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
        $constituencyCount = Constituency::all()->count();
        return view('constituency.edit',compact('constituency','constituencyCount'));
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
     * Redirect the user either to fill its constituency or to constituency page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function yourConstituency(){

        if(Auth::user()->constituency_id == null){
            Session::flash('message', 'Please select your State & Loksabha Constituency !');
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

        if($request->track == 1)
            return $this->show($request->constituency);
        elseif($request->track == 2)
            return $this->contestants($request->constituency);
        elseif($request->track == 3)
            return  $this->officeBearer($request->constituency);
        else
            return redirect()->back();
    }

    public function contestants($id){

        $constituency = Constituency::find($id);
        $contestants = Contestant::query()->where('constituency_id','=',$constituency->id)->with('gender')->get();

        //return $constituency;



        //$constituency = $constituency->with('contestants.gender')->get();

        return view('constituency.contestants',compact('constituency','contestants'));
    }

    public function officeBearer($id){

        $constituency = Constituency::query()->where('id','=',$id)->with('filled','vacant')->first();

        //return $constituency;
        return view('constituency.office-bearer',compact('constituency'));

    }



}
