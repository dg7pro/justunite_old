@extends('layouts.master')

@section('extra-css')
    <style>
        iframe, object, embed {
            max-width: 100%;
        }
    </style>

@endsection

@section('content')
    <div class="jumbotron color5">
        <div class="container">
            <h1 class="display-3">Bihar</h1>
            <p>This page shows list of all the candidates running election from parliamentary constituency. The candidate which peoples of  select will be our candidate for 2019 General Elections from </p>
            <p><a class="btn btn-outline-dark btn-lg" href="{{url('states/'.Auth::User()->state_id.'/constituencies')}}" role="button">All Members &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Bihar</h3>
                <table class="table table-bordered table-striped">
                    <tr><th>Name: </th><th>Bihar</th></tr>
                    <tr><th>Capital: </th><th></th></tr>
                    <tr><th>Population: </th><th></th></tr>
                    <tr><th>Language: </th><th></th></tr>
                    <tr><th>Literacy: </th><th></th></tr>
                    <tr><th>Income: </th><th></th></tr>
                    <tr><th>Lok Sabha Seats(PC): </th><th></th></tr>
                    <tr><th>Vidhan Sabha Seats(AC): </th><th></th></tr>
                    <tr><th>Ruling Party: </th><th></th></tr>
                    <tr><th>Opposition Party: </th><th></th></tr>
                    <tr><th>Chief Minister: </th><th></th></tr>
                    <tr><th>Governor: </th><th></th></tr>
                    <tr><th>CEO: </th><th></th></tr>
                </table>
                <br>
                <h3>List of Political Parties in Bihar</h3>
                <ul class="list-group">
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <br>
                <h3>List of Constituencies in Bihar</h3>
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

                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7274324.895936849!2d83.77803494441902!3d27.095930115391756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed5844f0bb6903%3A0x57ad3fed1bbae325!2sBihar!5e0!3m2!1sen!2sin!4v1518082905742"
                            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7274324.895936849!2d83.77803494441902!3d27.095930115391756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed5844f0bb6903%3A0x57ad3fed1bbae325!2sBihar!5e0!3m2!1sen!2sin!4v1518082905742"
                            width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <br>

                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640335.1357952277!2d83.54732188221799!3d26.998082191557835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed5844f0bb6903%3A0x57ad3fed1bbae325!2sBihar!5e0!3m2!1sen!2sin!4v1518083510071"
                            width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>

            @include('layouts.partials.sidemenu')
        </div>
    </div>
@endsection