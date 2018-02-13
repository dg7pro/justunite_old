@extends('layouts.app2')

@section('content')
    <div class="jumbotron" style="background-color: {{$group->hex}};">
        <div class="container">
            <h1 class="display-3">{{$group->name}}</h1>
            <p>You have joined as {{$group->name}} member</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Vote for President &raquo;</a></p>
        </div>
    </div>
    <div class="jumbotron">
        <div class="row">
        <div class="col-md-3">
            <b>Other Groups >></b>
            <br>in your constituency:

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>

    </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Show Particular Group</h2>
                {{$group}}


                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Description & Notes:</h4>
                    <p>
                        This page contains details function and responsibilities of members of this group.
                        How to change the group.
                        Selection of the president of the group
                        Constituency Knowledge

                    </p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>

                <br>
                <br>
                <br>


            </div>
        </div>
    </div>

@endsection