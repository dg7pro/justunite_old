@extends('layouts.app2')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, India!</h1>
            <p>This page shows the weekly poll to know and share the views of Indians</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <h2>{{$poll->question}}</h2>
                  {{--{{$options}}--}}
                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Option</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Select</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{--{!! $receivedVoteOptionId = null !!}--}} {{--Option Id which auth user voted for--}}
                        @foreach($options as $option)
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
                            @if($option->id == $receivedVoteOptionId)
                                <tr style="background-color: #0d3625">
                                    <th scope="row">{{$option->id}}</th>
                                    <td>{{$option->answer}}</td>
                                    <td>{{$option->votes_count}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-default btn-xs">Voted</button>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <th scope="row">{{$option->id}}</th>
                                    <td>{{$option->answer}}</td>
                                    <td>{{$option->votes_count}}</td>
                                    <td>
                                        <form method="post" action="{{url('options/vote/'.$option->id)}}" class="form-inline">
                                            {{csrf_field()}}
                                            <input name="currentOption" type="hidden" value="{{$receivedVoteOptionId}}">
                                            <button type="submit" class="btn btn-success btn-xs">Vote</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
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
