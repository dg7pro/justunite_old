@extends('layouts.master')

@section('content')

    {{--<div class="jumbotron color3">
        <div class="container">
            <h1 class="display-3">Hello, {{$constituency->pc_name}}!</h1>
            <p>This page shows list of all the candidates running election from {{$constituency->pc_name}} parliamentary constituency. The candidate which peoples of {{$constituency->pc_name}} select will be our candidate for 2019 General Elections from {{$constituency->pc_name}}</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>--}}

    <div class="jumbotron color3">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1 align="center">Total Nationwide JU members: {{ $members}}</h1>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>

   {{-- <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <h2>List of All Members in {{$constituency->pc_name}} </h2>
              --}}{{--  {{$users}}--}}{{--
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Credits</th>
                        <th scope="col">Select</th>
                    </tr>
                    </thead>
                    <tbody>
                    {!! $receivedVoteUserId = null !!}
                    @foreach($users as $user)
                            --}}{{--{{$user}}--}}{{--
                        @foreach($user->votes as $vote)
                            --}}{{--{{$vote->user_id}}--}}{{--
                            @if(Auth::user()->id == $vote->user_id)
                                {{! $receivedVoteUserId = $user->id }}
                                --}}{{--@php
                                    $receivedVoteUserId = $user->id
                                @endphp--}}{{--
                            @endif
                        @endforeach

                        {{$receivedVoteUserId}}
                       --}}{{-- <hr>--}}{{--
                        @if($user->id == $receivedVoteUserId)
                            <tr style="background-color: #0d3625">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->votes_count}}</td>
                                <td>{{$user->votes()->sum('credits')}}</td>
                                <td>
                                    @if(Auth::user()->id == $user->id)
                                        <form method="get" action="" class="form-inline">
                                            <button type="submit" class="btn btn-default btn-xs">Vote</button>
                                        </form>
                                    @else
                                        <form method="get" action="" class="form-inline">
                                            <button type="submit" class="btn btn-default btn-xs">Vote</button>
                                        </form>
                                    @endif
                                    --}}{{--<form method="POST" action="{{url('courses/'.$course->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                    </form>--}}{{--
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->votes_count}}</td>
                                <td>{{$user->votes()->sum('credits')}}</td>
                                <td>
                                    @if(Auth::user()->id == $user->id)
                                        <form method="get" action="" class="form-inline">
                                            <button type="submit" class="btn btn-default btn-xs">Vote</button>
                                        </form>
                                    @else
                                        <form method="get" action="" class="form-inline">
                                            <button type="submit" class="btn btn-success btn-xs">Vote</button>
                                        </form>
                                    @endif
                                    --}}{{--<form method="POST" action="{{url('courses/'.$course->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                    </form>--}}{{--
                                </td>
                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>

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
    </div>--}}
@endsection
