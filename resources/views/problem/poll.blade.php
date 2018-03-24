@extends('layouts.master')

@section('content')
    <div class="jumbotron color2">
        <div class="container">
            <h1 class="display-3">Indians</h1>
            <p><b>must find the final solution to all our problems</b></p>
            <p><a class="btn btn-outline-dark" href="{{url('problems')}}" role="button">27 Problems &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>
                    Which is most serious Problem ?

                </h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S No.</th>
                        <th scope="col">Problems</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Select</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--{!! $receivedVoteOptionId = null !!}--}} {{--Option Id which auth user voted for--}}
                    @foreach($problems as $problem)
                        {{--@foreach($option->votes as $vote)
                            {{$vote->user_id}}
                            @if(Auth::user()->id == $vote->user_id)
                                {{! $receivedVoteOptionId = $option->id }}
                                --}}{{--@php
                                    $receivedVoteOptionId = $user->id
                                @endphp--}}{{--
                            @endif
                        @endforeach

                        <b>{{$receivedVoteOptionId}}</b>
                        <hr>--}}
                        @if(Auth::guest())
                            <tr>
                                <th scope="row">{{$problem->id}}</th>
                                <td>
                                    <a href="{{url('problems/'.$problem->id)}}"><b>{{$problem->title}}</b></a>
                                </td>
                                <td>{{$problem->votes_count}}</td>
                                <td>
                                    {{--<form method="post" action="{{url('makeReadyForVoting')}}" class="form-inline">
                                        {{csrf_field()}}
                                        <input name="currentOption" type="hidden" value="{{$receivedVoteProblemId}}">
                                        <button type="submit" class="btn btn-success btn-xs">Vote</button>
                                    </form>--}}
                                    <a class="btn btn-info" href="{{ url('loginToVote') }}">Vote</a>
                                </td>
                            </tr>


                        @else

                            @if($problem->id == $receivedVoteProblemId)
                                {{--<tr style="background-color: #0d3625">--}}
                                <tr style="background-color: #06b0cf">
                                    <th scope="row">{{$problem->id}}</th>
                                    <td>
                                        <a href="{{url('problems/'.$problem->id)}}"><b>{{$problem->title}}</b></a>
                                    </td>
                                    <td>{{$problem->votes_count}}</td>
                                    <td >
                                        <button type="submit" class="btn btn-default btn-xs disabled">Vote</button>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <th scope="row">{{$problem->id}}</th>
                                    <td>
                                        <a href="{{url('problems/'.$problem->id)}}"><b>{{$problem->title}}</b></a>
                                    </td>
                                    <td>{{$problem->votes_count}}</td>
                                    <td>
                                        <form method="post" action="{{url('problems/vote/'.$problem->id)}}" class="form-inline">
                                            {{csrf_field()}}
                                            <input name="currentOption" type="hidden" value="{{$receivedVoteProblemId}}">
                                            <button type="submit" class="btn btn-info btn-xs">Vote</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <br>

                <a href="{{$whatsapp}}" role="button" class="btn btn-outline-success" ><i class="fa fa-whatsapp"> Join Whatsapp</i> </a>
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
        </div>
    </div>
@endsection