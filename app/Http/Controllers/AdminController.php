<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;

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

    /**
     * Show Administrator Dashboard
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
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


}
