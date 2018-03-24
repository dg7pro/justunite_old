@extends('layouts.master')

@section('content')

    <div class="jumbotron color4">
        <div class="container">
            <h1 class="display-3">{{$party->name}}</h1>
            <p>This page shows list of all the parliamentary constituency in India. Total their are 543 seats </p>
            <p><a href="#" role="button" class="btn btn-outline-warning" >Learn more &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>{{$party->name}}
                    @can('manage_site')
                        <a href="{{url('parties/'.$party->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>

                    @endcan
                </h2>
                <img src="{{asset('images/parties/over-population.jpg')}}" alt="" width="100%">
                <br>
                <br>
                <div>
                    <b>{!! $party->details !!}</b>
                </div>
                <br>
                <br>

                <table class="table table-bordered table-striped col-md-6">
                    <tr><th colspan="2">Party Factfile:</th></tr>
                    <tr><th>Name: </th><th>{{$party->name}}</th></tr>
                    <tr><th>Shortform: </th><th>{{$party->shortform}}</th></tr>
                    <tr><th colspan="2">Party Leadership:</th></tr>
                    <tr><th>Founder: </th><th>{{$party->founder}}</th></tr>
                    <tr><th>President: </th><th>{{$party->president}}</th></tr>
                    <tr><th>Leader: </th><th>{{$party->leader}}</th></tr>

                </table>
                <br>
                <br>
            </div>

            @include('layouts.partials.sidemenu')
        </div>
    </div>
@endsection

@section('extra-js')
    <script>

        function ConfirmDelete(){

            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;

        }
    </script>
@endsection
