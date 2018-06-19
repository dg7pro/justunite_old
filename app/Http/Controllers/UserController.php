<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Content;
use App\User;
use App\Image;
use App\Profession;
use App\Vote;
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
        $this->middleware('auth')->except('constituencyMembers','show','countMembers');
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
            ->with('gender','age','marital','religion','education','profession','opinion','add','opinion')
            ->first();

        if ($user->invisible == 1 and $id != Auth::id()){
            abort('500','The User has Hidden his/her Profile');
        }



        $engMsg = Content::query()->where('page','=','profilepage')->first();
        $hiMsg = Content::query()->where([
            ['page','=','profilepage'],
            ['slug','=','hindi']
        ])->first();

        //$professions = Profession::all();

        $knownBys = $user->knownBy()->get();

        $i_know_already = 0;
        foreach($knownBys as $kby) {
            if (Auth::id() == $kby->id) {
                $i_know_already = 1;
            }
        }


        // Important Snippet of code
        /*$images = DB::table('images')->where([
            ['imagable_type','=','App\Profession'],
            ['imagable_id','=',$user->profession_id]
        ])->get();*/

        $images = DB::table('images')->where([
            ['imagable_type','=','App\User']
        ])->get();

        //return $user;
        //return $i_know_already;
        //return $knownBys;
        return view('user.show-ajax2',compact('user','i_know_already','images','engMsg','hiMsg'));
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
        $user = User::query()->where('id', '=', $id)->first();

            // ***** Very important piece of code
            /*if ($user->constituency_id != $request->constituency) {
                $vote = Vote::query()->where(['user_id' => Auth::id()],['votable_type' => 'App\User'])->first();
                if(isset($vote)){
                    $vote->delete();
                }
            }*/

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

/*
|--------------------------------------------------------------------------
| Other Important Functions
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    public function ajaxVote(Request $request, $id){

        // Retrieve the current vote
        //$newOption = $request->newOption;
        $currentOption = $request->currentOption;

        if($currentOption==null){
            $user = Auth::User();
            $u = User::query()->find($id);
            $u->votes()->create(['user_id'=>$user->id]);
            //return redirect()->back();
            return response()->json(['message'=>'You have successfully voted','id'=>$id]);

        }else {
            $u = User::query()->find($currentOption);
            $vote = $u->votes()->where('user_id', Auth::id())->first();
            $vote->update(['votable_id' => $id]);
            //return redirect()->back();
            return response()->json(['message'=>'You have successfully changed vote','id'=>$id]);
        }
    }


    public function vote(Request $request, $id){

        if($id == Auth::id()){

            return redirect()->back()->withErrors('You can\'t vote your own profile !');
        }

        // Retrieve the current vote
        $currentOption = $request->currentOption;

        if($currentOption==null){
            $authUser = Auth::User();
            $user = User::query()->find($id);
            $user->votes()->create(['user_id'=>$authUser->id,'credits'=>$authUser->credits]);
            return redirect()->back();
        }else {
            $user = User::query()->find($currentOption);
            $vote = $user->votes()->where('user_id', Auth::id())->first();
            $vote->update(['votable_id' => $id]);
            return redirect()->back();
        }
    }




    /*public function totalMembers(){

        $usersCount = User::all()->count();
        return view('user.total-members',compact('usersCount'));
    }
*/


    public function constituencyMembers($id){

        //$constituency = Constituency::find($id);
        $constituency = Constituency::where('id','=',$id)->first();
        //return $constituency->pc_name;

        //return $constituency;

        /*$users =  $constituency->members()->all();
        return $users;*/

        /*$users = User::where('constituency_id','=',$id)
            ->with('votes')
            ->withCount('knownBy')
            ->orderBy('known_by_count','desc')->get();*/

        $users = User::where([['constituency_id','=',$id],['invisible','=',0]])
            ->with('votes')
            ->withCount('knownBy')
            ->orderBy('known_by_count','desc')->get();


        $allUsers = User::select('id')->with('votes')->get();


        $receivedVoteUserId = null;
        foreach($allUsers as $user){
            foreach ($user->votes as $vote){
                if (Auth::id()==$vote->user_id){
                    $receivedVoteUserId = $user->id;
                }
            }
        }

        if($users->count()){
            return view('user.list-members',compact('users','receivedVoteUserId','constituency'));
        }
        else{
            return $this->countMembers();
        }

    }

    public function countMembers(){

        $members = User::all()->count();
        return view('members',compact('members'));
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
            /*'state'=>'required',
            'constituency' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'marital' => 'required',
            'education' => 'required',
            'age' => 'required',
            'profession' => 'required',
            'group' => 'required',*/
            'mobile' => 'digits:10'
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
        //$image->profession_id = $request->profession;
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

   /* public function makeReady($id){

        return $this->constituencyMembers($id);

    }*/

    public function test(){

        return $users = DB::table('users')->select('name', 'email as user_email')->get();
    }

    public function settings(){

        return view('user.settings');
    }

    public function hideUser(Request $request, User $user){

        $user->invisible = isset($request['invisible']);
        $user->update();

        //Flash Message
        Session::flash('message', 'Profile hidden successfully!');
        return back();

        //return $user;


    }

}
