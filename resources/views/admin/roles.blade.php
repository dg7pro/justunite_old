@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-warning">
            <div class="panel-body">
                @include('admin.partials.breadcrumbs')
                <i class="fa fa-long-arrow-right"></i>
                <a href="{{url('/roles')}}">Manage Roles</a>
            </div>
        </div>

        @include('layouts.alerts.success')
        @include('layouts.alerts.error')

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
        <div class="row">
            <div class="col-md-6">
                <h4>Roles with Permissions</h4>
                <div class="panel panel-default">

                    <table class="table table-bordered table-responsive">
                        <thead>
                        <th>Id</th>
                        <th>Permissions</th>
                        <th>Admin</th>
                        <th>Manager</th>
                        <th>Student</th>
                        <th>User</th>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td><input type="checkbox" {{ $permission->isAssociatedWithRole('Admin') ? 'checked' : '' }} name=""></td>
                                <td><input type="checkbox" {{ $permission->isAssociatedWithRole('Manager') ? 'checked' : '' }} name=""></td>
                                <td><input type="checkbox" {{ $permission->isAssociatedWithRole('Student') ? 'checked' : '' }} name=""></td>
                                <td><input type="checkbox" {{ $permission->isAssociatedWithRole('User') ? 'checked' : '' }} name=""></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <h4>All Users with Roles</h4>
                <div class="panel panel-default">

                    <table class="table table-bordered table-responsive">
                        <thead>
                        <th>Id</th>
                        <th>Users</th>
                        <th>Admin</th>
                        <th>Manager</th>
                        <th>Student</th>
                        <th>User</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->email}}<input type="hidden" name="email" value="{{ $user->email }}"></td>
                                <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                                <td><input type="checkbox" {{ $user->hasRole('Manager') ? 'checked' : '' }} name="role_manager"></td>
                                <td><input type="checkbox" {{ $user->hasRole('Student') ? 'checked' : '' }} name="role_student"></td>
                                <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        {{----}}
        <div class="row">

            <div class="col-md-6">
                {{--<h4>Attach Role to User</h4>--}}
                <div class="panel panel-info">
                    <div class="panel panel-heading">
                        Attach Role to User
                    </div>
                    <div class="panel panel-body">
                        <form method="POST" action="{{url('assign-role')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter user email">
                            </div>
                            <div class="form-group">
                                <label for="poll">Select Role</label>
                                <select name="poll" required="required" class="form-control">
                                    <option disabled selected>Select Poll</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" @if (old('role') == $role->id) selected="selected" @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Assign Role</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                {{--<h4>Detach Roles to Users</h4>--}}
                <div class="panel panel-warning">
                    <div class="panel panel-heading">
                        Detach Roles to Users
                    </div>
                    <div class="panel panel-body">
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
        <br>
        <br>
    </div>
@endsection
