<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id','=',$id)->with('gender','age','marital','religion','education','profession')->first();
        //return $user;
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $user = User::query()->where('id','=',$id)->first();

        $user->state_id = $request->state;
        $user->constituency_id = $request->constituency;
        $user->gender_id = $request->gender;
        $user->religion_id = $request->religion;
        $user->marital_id = $request->marital;
        $user->education_id = $request->education;
        $user->age_id = $request->age;
        $user->profession_id = $request->profession;
        $user->group_id = $request->group;
        $user->mobile = $request->mobile;
        $user->update();

        //Flash Message
        Session::flash('message', 'Profile updated successfully!');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function totalMembers(){

        $usersCount = User::all()->count();
        return view('user.members',compact('usersCount'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
           /* 'state'=>'required',
            'constituency' => 'required',*/
            /*'gender' => 'required',
            'religion' => 'required',

            'marital' => 'required',
            'education' => 'required',
            'age' => 'required',
            'profession' => 'required',
            'group' => 'required',
            'mobile' => 'required'*/
        ]);
    }



}
