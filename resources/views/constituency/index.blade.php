@extends('layouts.master')

@section('content')

    <div class="jumbotron color3">
        <div class="container">
            <h1 class="display-3">543 Loksabha Seats</h1>
            <p>This page shows list of all the parliamentary constituency in India. Total their are 543 seats </p>
            <p>
                <a href="{{url('constituencies/'.Auth::User()->constituency_id)}}" role="button" class="btn btn-outline-dark btn-lg" >Your Constituency &raquo;</a>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>List of Constituencies</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Constituency Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">State</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($constituencies as $constituency)
                       {{-- <tr style="background-color: #0d3625">--}}
                        <tr>

                            <th scope="row">{{$constituency->id}}</th>
                            <td><a href="{{url('constituencies/'.$constituency->id)}}"> {{$constituency->pc_name}}</a></td>
                            <td>{{$constituency->pc_type}}</td>
                            <td>{{$constituency->state->name}}</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            @include('layouts.partials.sidemenu')
        </div>
    </div>
@endsection
