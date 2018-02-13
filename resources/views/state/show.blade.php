@extends('layouts.master')

@section('content')
    <div class="jumbotron color5">
        <div class="container">
            <h1 class="display-3">{{$state->name}}</h1>
            <p>This page shows list of all the candidates running election from parliamentary constituency. The candidate which peoples of  select will be our candidate for 2019 General Elections from </p>
            <p><a class="btn btn-outline-dark btn-lg" href="{{url('states/'.Auth::User()->state_id.'/constituencies')}}" role="button">All Members &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>{{$state->name}}</h3>
                <table class="table table-bordered table-striped">
                    <tr><th>Name: </th><th>{{$state->name}}</th></tr>
                    <tr><th>Capital: </th><th>{{$state->capital}}</th></tr>
                    <tr><th>Population: </th><th>{{number_format($state->population)}}</th></tr>
                    <tr><th>Language: </th><th>{{$state->language}}</th></tr>
                    <tr><th>Literacy: </th><th>{{$state->literacy}}</th></tr>
                    <tr><th>Income: </th><th></th></tr>
                    <tr><th>Lok Sabha Seats(PC): </th><th>{{$state->pc}}</th></tr>
                    <tr><th>Vidhan Sabha Seats(AC): </th><th>{{$state->ac}}</th></tr>
                    <tr><th>Ruling Party: </th><th></th></tr>
                    <tr><th>Opposition Party: </th><th></th></tr>
                    <tr><th>Chief Minister: </th><th>{{$state->cm}}</th></tr>
                    <tr><th>Governor: </th><th>{{$state->governor}}</th></tr>
                    <tr><th>CEO: </th><th></th></tr>
                </table>
                <br>
                <h3>List of Political Parties in {{$state->name}}</h3>
                <ul class="list-group">
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <br>
                <h3>List of Constituencies in {{$state->name}}</h3>
                <ul class="list-group">
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>




                {{--<ul class="list-group" >
                    <li class="list-group-item"><b>Name: <i>{{$state->name}}</i></b></li>
                    <li class="list-group-item"><b>Capital: <i>Patna</i></b></li>
                    <li class="list-group-item"><b>Population:</b></li>
                    <li class="list-group-item "><b>Language:</b></li>
                    <li class="list-group-item"><b>Literacy:</b></li>
                    <li class="list-group-item"><b>Income:</b></li>
                    <li class="list-group-item"><b>Lok Sabha Seats(PC): </b></li>
                    <li class="list-group-item"><b>Vidhan Sabha Seats(AC):</b></li>
                    <li class="list-group-item"><b>Ruling Party:</b></li>
                    <li class="list-group-item"><b>Opposition Party:</b></li>
                    <li class="list-group-item"><b>Chief Minister:</b></li>
                    <li class="list-group-item"><b>Governor:</b></li>
                    <li class="list-group-item"><b>CEO:</b></li>
                    <li class="list-group-item"><b>Vestibulum at eros</li>
                </ul>--}}

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