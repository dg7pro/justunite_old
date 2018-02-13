@extends('layouts.master')

@section('content')

    <div class="jumbotron color5">
        <div class="container">
            <h1 class="display-3">India: The Union of States!</h1>
            <p>The first article of the Constitution of India states that "India, that is Bharat, shall be a union of states. Presently India consists of 29 states and 7 Union Territories including Delhi </p>
            <p><a class="btn btn-outline-dark btn-lg" href="{{url('states/'.Auth::User()->state_id)}}" role="button">Your State &raquo;</a></p>
            {{--<div class="row">
                <div class="col-md-8">
                    <h1 class="display-3">India: The Union of States!</h1>
                    <p>The first article of the Constitution of India states that "India, that is Bharat, shall be a union of states. Presently India consists of 29 states and 7 Union Territories including Delhi </p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <img src="images/india.jpg" alt="India" height="300" >
                </div>
            </div>--}}
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>List of States</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name of State</th>
                        <th scope="col">Loksabha Seats</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($states as $state)
                        <tr>
                            <th scope="row">{{$state->id}}</th>
                            <td><a href="{{url('states/'.$state->id)}}">{{$state->name}}</a></td>
                            <td>{{$state->constituencies_count}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <br>
                <br>
                <h3>List of UT</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name of Union Territory</th>
                        <th scope="col">Loksabha Seats</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($uts as $ut)
                        <tr>
                            <th scope="row">{{$ut->id}}</th>
                            <td><a href="{{url('states/'.$ut->id)}}">{{$ut->name}}</a></td>
                            <td>{{$ut->constituencies_count}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <br>
                <br>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Description & Notes:</h4>
                    <p>Each group has different voting power. User can belong to 2 or more groups, their voting power adds up.
                        Like any women can be member of Women Wing as well as ETF her total voting power will be 2+3=5 </p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>

                <br>
                <br>
                <br>

            </div>

            @include('layouts.partials.sidemenu')
        </div>
    </div>
@endsection
