@extends('layouts.master')

@section('content')

    <div class="jumbotron color5">
        <div class="container">
            <h3 class="display-3">Our Members</h3>
            <p><b>All India members list alphabetical wise</b></p>
            {{--@if(Auth::guest())
                <p><a href="{{url('register')}}" role="button" class="btn btn-outline-dark" >Register &raquo;</a></p>

            @else
                <p><a class="btn btn-outline-dark" href="{{url('states/your-state')}}" role="button">Your State &raquo;</a></p>
            @endif--}}

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <h2>List of Members</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                        @endcan

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <th><a href="{{url('users/admin-show/'.$user->id)}}" class="text-primary">{{$user->name}}</a></th>
                            <th class="text-primary">{{$user->email}}</th>
                            @can('manage_site')
                                <th>
                                    <a href="{{url('users/'.$user->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                </th>
                            @endcan
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <br><br>
                {{ $users->links('vendor.pagination.bootstrap-4') }}
                <br><br>

            </div>

            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection
