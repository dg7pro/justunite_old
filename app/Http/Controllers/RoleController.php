<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    /**
     * Assign User Admin/Manager Role
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function assignRole(Request $request)
    {
        $this->authorize('manage_roles');

        $user = User::query()->where('email', $request['email'])->first();
        if(!$user){
            Session::flash('message', 'Email not found! Plz check the email. Or first register the user');
            return redirect()->back();
        }
        $user->roles()->detach();
        $user->roles()->attach($request->poll);
        return redirect()->back();
    }

    /**
     * De-assign User Admin/Manager Role
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function deAssignRole(Request $request)
    {
        $this->authorize('manage_roles');

        $user = User::query()->where('email', $request['email'])->first();
        if(!$user){
            Session::flash('message', 'Email not found! Plz check the email. Or first register the user');
            return redirect()->back();
        }
        $user->roles()->detach();
        return redirect()->back();

    }
}
