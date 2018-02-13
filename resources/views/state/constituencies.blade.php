@extends('layouts.master')

@section('content')

    <div class="jumbotron color5">
        <div class="container">
            <h1 class="display-3">{{$state->name}}</h1>
            <p>This page shows list of all the parliamentary constituency in India. Total their are 543 seats </p>
            <p><a class="btn btn-outline-dark btn-lg" href="{{url('constituencies/'.Auth::User()->constituency_id)}}" role="button">Your Constituency &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>List of Constituencies in {{$state->name}}</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Constituency Name</th>
                        <th scope="col">Type</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($state->constituencies as $constituency)
                        <tr>

                            <th scope="row">{{$constituency->id}}</th>
                            <td><a href="{{url('constituencies/'.$constituency->id)}}"> {{$constituency->pc_name}}</a></td>
                            <td>{{$constituency->pc_type}}</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-md-3">
                <br>
                <br>

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Quick Links
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">States
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Constituencies
                        <span class="badge badge-success badge-pill">14</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Groups
                        <span class="badge badge-danger badge-pill">14</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros
                        <span class="badge badge-info badge-pill">14</span>
                    </a>
                </div>


            </div>
        </div>
    </div>
@endsection
