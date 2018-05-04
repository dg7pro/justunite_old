<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * GroupController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
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

        $groups = Group::all();
        return view('group.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
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
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('group.show',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('group.edit',compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }

    public function mygroup(){

        $user = User::find(1);
        //$group = $user->group->id;  // access id of group
        //$group = $user->group()->get();
        $group = $user->group;
        return view('group.mygroup',compact('group'));
        //return $group;

    }

    public function electPresident(){

        // Auth user constituency
        // Auth user group

        $constituency = Auth::user()->constituency_id;
        $group = Auth::user()->group_id;
        $users = User::query()->where([['id','!=',Auth::id()],['constituency_id',$constituency ],[ 'group_id',$group]])
            ->has('votes')->withCount('votes')->with('votes')->orderBy('votes_count','desc')->get();
        return view('group.vote',compact('users','constituency','group'));
        //return $users;

    }
}
