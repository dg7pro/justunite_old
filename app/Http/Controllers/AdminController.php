<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('manage_roles');

        $roles= Role::all();

        $permissions = Permission::all();
        $users = User::query()->whereHas('roles',function($query){

            $query->where('role_id','<=',2);

        })->take(7)->get();

        return view('admin.index',compact('roles','permissions','users'));
    }

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
