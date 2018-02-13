@extends('layouts.master')

@section('content')

    <div class="jumbotron color2">
        <div class="container">
            <h1 class="display-3">Problems (समस्याएं)</h1>
            <p>This page shows list of all the parliamentary constituency in India. Total their are 543 seats </p>
            <p><a href="#" role="button" class="btn btn-outline-warning" >Vote &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>List of Problems</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Problems</th>
                        <th scope="col">Votes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($problems as $problem)
                        <tr>
                            <th scope="row">{{$problem->id}}</th>
                            <td><a href="{{url('problems/'.$problem->id)}}"><b>{{$problem->title}}</b></a></td>
                            <td>{{500}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <br>
                <br>

            </div>

            @include('layouts.partials.sidemenu')
        </div>
    </div>
@endsection
