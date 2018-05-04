@extends('layouts.master')

@section('content')

    <div class="container">

        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4>List of all Roles</h4>
                <ul class="list-group">
                    @foreach($roles as $role)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    {{$role->id.'. '}}{{$role->name}}
                                </div>
                                <div class="col-md-4">
                                    {{$role->label}}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <br>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h4>Roles with Permissions</h4>
                <div style="height: 60vh; overflow: auto">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Permissions</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Manager</th>
                            <th scope="col">User</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <th scope="row">{{$permission->id}}</th>
                                <td>{{$permission->name}}</td>
                                <td><input type="checkbox" {{ $permission->isAssociatedWithRole('Admin') ? 'checked' : '' }} name=""></td>
                                <td><input type="checkbox" {{ $permission->isAssociatedWithRole('Manager') ? 'checked' : '' }} name=""></td>
                                <td><input type="checkbox" {{ $permission->isAssociatedWithRole('User') ? 'checked' : '' }} name=""></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
            <div class="col-md-6">
                <h4>All Users with Roles</h4>
                <div style="height: 20vh; overflow: auto">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Users</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Manager</th>
                            <th scope="col">User</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->email}}<input type="hidden" name="email" value="{{ $user->email }}"></td>
                                <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                                <td><input type="checkbox" {{ $user->hasRole('Manager') ? 'checked' : '' }} name="role_manager"></td>
                                <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="row">

            <div class="col-md-6">
                {{--<h4>Attach Role to User</h4>--}}
                <div class="card">
                    <div class="card-header">
                        Attach Role to User
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{url('assign-role')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter user email">
                            </div>
                            <div class="form-group">
                                <label for="poll">Select Role</label>
                                <select name="poll" required="required" class="form-control">
                                    <option disabled selected>Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" @if (old('role') == $role->id) selected="selected" @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Assign Role</button>
                        </form>
                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-6">
                {{--<h4>Detach Roles to Users</h4>--}}
                <div class="card">
                    <div class="card-header">
                        Detach Roles to Users
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{url('de-assign-role')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter user email">
                            </div>
                            {{--<div class="form-group">
                                <label for="poll">Select Role</label>
                                <select name="poll" required="required" class="form-control">
                                    <option disabled selected>Select Poll</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" @if (old('role') == $role->id) selected="selected" @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>--}}
                            <button type="submit" class="btn btn-default">De-Assign Role</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        CRUD Models
                    </a>
                    <a href="{{url('religions')}}" class="list-group-item list-group-item-action">Religions</a>
                    <a href="{{url('educations')}}" class="list-group-item list-group-item-action">Education</a>
                    <a href="{{url('professions')}}" class="list-group-item list-group-item-action">Profession</a>
                    <a href="{{url('genders')}}" class="list-group-item list-group-item-action">Gender</a>
                    <a href="{{url('maritals')}}" class="list-group-item list-group-item-action">Marital Status</a>
                    <a href="{{url('ages')}}" class="list-group-item list-group-item-action">Age Group</a>
                </div>
                <br>
            </div>

            <div class="col-md-6">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Content Models
                    </a>
                    <a href="{{url('contents')}}" class="list-group-item list-group-item-action">Contents</a>
                    <a href="{{url('constituencies')}}" class="list-group-item list-group-item-action">Constituencies</a>
                    <a href="{{url('ctypes')}}" class="list-group-item list-group-item-action">C Types</a>
                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                    <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
@endsection
