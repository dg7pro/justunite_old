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
                                <a class="btn btn-info" href="{{ url('loginToVoteProblem') }}">Vote</a>
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
                                    <form method="post" action="{{url('problems/vote/'.$problem->id)}}" class="form-inline" onsubmit="{{ $receivedVoteProblemId != null ? 'ConfirmVoteChange()' : ''}}">
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
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Track your CONSTITUENCY:</h4>
                    <br>
                    <form method="POST" action="{{url('constituency/track')}}">
                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <select name="state" id="state" class="form-control">
                                        <option value="">Select State...</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->name2}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">

                                    <select id="constituency" name="constituency" class="form-control">
                                        <option value="">Select State first...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Go to your Constituency</button>
                    </form>
                </div>

                <br>
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

    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="state"]').on('change', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: 'states/ajax/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {

                            //console.log(data);
                            $('select[name="constituency"]').html('<option value="">Select Constituency</option>');
                            $.each(data, function(key, value) {
                                $('select[name="constituency"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="constituency"]').empty();
                }
            });
        });
    </script>


@endsection
