@extends('layouts.master')

@section('content')

    <div class="jumbotron color2">
        <div class="container">
            <h1 class="display-3">Problems (समस्याएं)</h1>
            <p><b>700 years, 543 parliament members, 1048 legislative assembly members and more than 1000 Political Parties,
                    but still unable to solve 27 problems. Hope this time we chose Prime minister who can solve all these problems</b></p>
            <p>
                {{--<a href="{{url('problems/voting')}}" role="button" class="btn btn-outline-dark" >Most Serious Problem &raquo;</a>--}}
                <a href="{{$whatsapp}}" role="button" class="btn btn-outline-dark" ><i class="fa fa-whatsapp"> Join Whatsapp</i> </a>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of Problems
                    {{--<a href="{{url('problems/voting')}}" role="button" class="btn btn-outline-info" >Most Serious Problem &raquo;</a>--}}
                    <a href="{{$whatsapp}}" role="button" class="btn btn-outline-success" ><i class="fa fa-whatsapp"> Join Whatsapp</i> </a>

                </h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Problems</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Select</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                            {{--<th scope="col">Del</th>--}}
                        @endcan
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
                            <th scope="row">{{ $loop->iteration }}</th>
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
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{url('problems/'.$problem->id)}}"><b>{{$problem->title}}</b></a>
                                </td>
                                <td>{{$problem->votes_count}}</td>
                                <td >
                                    <button type="submit" class="btn btn-default btn-xs disabled">Vote</button>
                                </td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('problems/'.$problem->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                    {{--<td>
                                        <form method="POST" action="{{url('problems/'.$problem->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Del</button>
                                        </form>
                                    </td>--}}
                                @endcan
                            </tr>
                        @else
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{url('problems/'.$problem->id)}}"><b>{{$problem->title}}</b></a>
                                </td>
                                <td>{{$problem->votes_count}}</td>
                                <td>
                                    <form method="post" action="{{url('problems/vote/'.$problem->id)}}" class="form-inline" onsubmit="return ConfirmVoteChange()">
                                        {{csrf_field()}}
                                        <input name="currentOption" type="hidden" value="{{$receivedVoteProblemId}}">
                                        <button type="submit" class="btn btn-info btn-xs">Vote</button>
                                    </form>
                                </td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('problems/'.$problem->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                    {{--<td>
                                        <form method="POST" action="{{url('problems/'.$problem->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Del</button>
                                        </form>
                                    </td>--}}
                                @endcan
                            </tr>
                        @endif
                    @endif

                    @endforeach

                    </tbody>
                </table>
                <br>
                {{--<p><a href="{{url('problems/voting')}}" role="button" class="btn btn-outline-dark" >Most Serious Problem &raquo;</a></p>
                <br>--}}
            </div>
            @include('layouts.partials.sidemenu')
        </div>
    </div>
    <br><br>
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
        function ConfirmVoteChange(){

            var x = confirm("You have already voted, do you want to change your vote?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
