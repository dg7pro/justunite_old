<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OfficeController extends Controller
{
    /**
     * OfficeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::with('constituencies')->get();
        return view('office.index',compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('office.create');
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

        $office = new Office();
        $office->name = $request->name;
        $office->save();

        //Flash Message
        Session::flash('message', 'Office created successfully!');

        // Redirect Back
        return redirect('offices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        return view('office.edit',compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $this->authorize('manage_site');

        // Validate Inputs
        $this->validator($request->all())->validate();

        // Update Age Group
        $office->name = $request->name;
        $office->update();

        //Flash Message
        Session::flash('message', 'Office updated successfully!');

        // Redirect Back
        return redirect('offices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
    }

    public function createPost(Office $office){

        $constituencies = Constituency::all();

        foreach ($constituencies as $constituency){
            $office->constituencies()->attach($constituency->id);
        }

        //Flash Message
        Session::flash('message', 'Post created successfully!');

        // Redirect Back
        return redirect()->back();
    }

    public function removePost(Office $office){

        $constituencies = Constituency::all();
        foreach ($constituencies as $constituency){
            $office->constituencies()->detach($constituency->id);
        }
        //Flash Message
        Session::flash('message', 'Post revoked successfully!');
        // Redirect Back
        return redirect()->back();

        /* Above is Important code commented out don't delete it */

        //Flash Message
        Session::flash('message', 'Can\'t be revoked from here!');

        // Redirect Back
        return redirect()->back();
    }

    public function applyFor(Office $office){

        if(Auth::user()->constituency_id == null){

            Session::flash('message', 'First complete your Profile !');
            return redirect('home');
        }

        $applied = DB::table('constituency_office')->where([
            ['constituency_id', '=', Auth::user()->constituency_id],
            ['user_id', '=', Auth::id()],
        ])->first();

        if($applied){
            Session::flash('message', 'You have already applied for some post !');
            return redirect('constituencies/'.Auth::user()->constituency_id.'/office-bearers');
            //return redirect()->back();
        }else{
            $office->constituencies()->attach(Auth::user()->constituency_id, ['user_id' => Auth::id()]);
            Session::flash('message', 'Applied Successfully !');
            return redirect('constituencies/'.Auth::user()->constituency_id.'/office-bearers');
            //return redirect()->back();
        }
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
            'name' => 'required'
        ]);
    }
}
