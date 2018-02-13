@extends('layouts.master')

@section('content')

    <div class="jumbotron color2">
        <div class="container">
            <h1 class="display-3">{{$problem->title}}</h1>
            <p>This page shows list of all the parliamentary constituency in India. Total their are 543 seats </p>
            <p><a href="#" role="button" class="btn btn-outline-warning" >Learn more &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>{{$problem->title}}</h2>

                <img src="{{asset('images/abc.jpg')}}" alt="Over Population" width="100%">


                <br>
                <br>
                <br>
                <br>




            </div>

            @include('layouts.partials.sidemenu')
        </div>
    </div>
@endsection
