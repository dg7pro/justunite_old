<?php

namespace App\Http\Controllers;

use App\User;
use App\Image;
use App\Profession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('manage_site');

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
        $user = User::where('id','=',$id)
            ->withCount('knownBy')
            ->with('gender','age','marital','religion','education','profession','opinion')
            ->first();

        $professions = Profession::all();

        $knownBys = $user->knownBy()->get();

        $i_know_already = 0;
        foreach($knownBys as $kby) {
            if (Auth::id() == $kby->id) {
                $i_know_already = 1;
            }
        }

        if ($user->hidden == 1){
            abort('403');
        }

        $images = DB::table('images')->where([
            ['imagable_type','=','App\User'],
            ['association','=',$user->profession_id]
        ])->get();

        //return $user;
        //return $i_know_already;
        //return $knownBys;
        return view('user.show-ajax',compact('user','i_know_already','images','professions'));
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

    public function getUserByUuid($uid){

        $user = User::where('uuid','=',$uid)->with('gender','age','marital','religion','education','profession')->first();
        return $user;
    }

    public function makeKnow($id){

        Auth::user()->knows()->attach($id);
        return redirect()->back();
        //return $id;

    }

    public function revokeKnow($id){

        Auth::user()->knows()->detach($id);
        return redirect()->back();

    }

    public function likeProfession($id){
        Auth::user()->likeProfessions()->attach($id);
        return redirect()->back();
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


    public function uploadImage(User $user, Request $request){

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
        $image->association = $request->profession;
        $image->heading = $request->heading;
        $image->caption = $request->caption;

        $user->images()->save($image);
        return redirect()->back();

    }

    public function loginToLike($id){

        //return redirect('users/'.$id);

        return $this->show($id);


    }

    public function like(Request $request){

        $id = $request->userid;
        Auth::user()->knows()->attach($id);

        $user = User::where('id','=',$id)->first();
        $known_by_count = $user->knownBy()->count();

        return response()->json(['message'=>'You have successfully liked ', 'id'=>$id, 'kbc'=>$known_by_count]);
    }

    public function unlike(Request $request){

        $id = $request->userid;
        Auth::user()->knows()->detach($id);

        $user = User::where('id','=',$id)->first();
        $known_by_count = $user->knownBy()->count();

        return response()->json(['message'=>'You have successfully Un-liked ', 'id'=>$id, 'kbc'=>$known_by_count]);
    }




}
