@extends('layouts.master')

@section('content')
    <div class="jumbotron color3">
        <div class="container">
            <h1 class="display-3">{{$constituency->pc_name}}</h1>
            <p>
                <b>
                @if($constituency->state->type == 1)
                    <b>State:</b>
                @else
                    <b>Union Territory:</b>
                @endif
                    <b>{{$constituency->state->name}}</b>

                <b> | </b>
                {{--1 for General, 2 for SC and 3 for General--}}
                @if($constituency->pc_type == 2)
                    Type: Reserved for SC
                @elseif($constituency->pc_type == 3)
                    Type: Reserved for ST
                @else
                    Type: Un-Categorized General Seat
                @endif
            </b>
            </p>
            <p>
                <a class="btn btn-outline-dark btn-lg" href="{{url('constituencies/'.$constituency->id.'/members')}}" role="button">All Members &raquo;</a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <h2>
                    {{$constituency->pc_name}}
                    @can('manage_site')
                        <a href="{{url('constituencies/'.$constituency->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                    @endcan
                </h2><br>
                <div>
                    <p><b>Loksabha Seat: <i class="text-primary">{{$constituency->pc_name}}</i></b></p>
                    <p>
                        <b>Type: <i class="text-primary">{{$constituency->ctype->description}}</i></b>
                    </p>
                    <p>
                        <b>{{$constituency->state->stype->name}}: <i class="text-primary">{{$constituency->state->name}}</i></b>
                    </p>
                </div><br>
                <div>
                    <h4>About <span class="text-primary">{{$constituency->pc_name}}</span></h4>
                    {!! $constituency->details !!}
                </div>
                <br>
                <h4 class="text-primary">Results of 2014 Elections:</h4>
                <table class="table table-bordered table-condensed">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Rank</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Party</th>
                        <th scope="col">Votes</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($contestants as $contestant)
                            <tr>
                                <th scope="row">{{$loop->iteration}}
                                    @if($loop->iteration ==1)
                                        <span class="badge badge-success">{{'Winner'}}</span>
                                    @elseif($loop->iteration ==2)
                                        <span class="badge badge-danger">{{'RunnerUp'}}</span>
                                    @endif
                                </th>
                                <th scope="row">{{$contestant->name}}</th>
                                <th scope="row">{{$contestant->gender->name}}</th>
                                <th scope="row">{{$contestant->party}}</th>
                                <th scope="row">{{$contestant->votes}}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <h4 class="text-primary">Fact-file of 2014 Elections:</h4>
                <div class="row">
                    <div class="col-md-6" style="padding-bottom: 7vh">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-warning active">Electors</li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Total Electors: <label class="text-primary">{{number_format($election->pivot->electors)}}</label></i></b>
                            </li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Total No. of Voters: <label class="text-primary">{{number_format($election->pivot->voters)}}</label></i></b>
                            </li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Turnout: <label class="text-primary">{{($election->pivot->turnout*100).'%' }}</label></i></b>
                            </li>
                        </ul>
                    </div>
                    <br class="visible-xs">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item active">Contestants</li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Nominations: <label class="text-primary">{{$election->pivot->nominations}}</label></i></b>
                            </li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Contestants: <label class="text-primary">{{$election->pivot->contestants}}</label></i></b>
                            </li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Forfeit Candidates: <label class="text-primary">{{$election->pivot->forfeited }}</label></i></b>
                            </li>
                        </ul>
                    </div>

                </div>
                {{--<br>
                <br>
                <h3>Members:</h3>
                <div style="height: 30vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            @can('manage_site')
                                <th scope="col">Profile</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($constituency->members as $member)
                            --}}{{-- <tr style="background-color: #0d3625">--}}{{--
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><a href="{{url('users/'.$member->id)}}">{{$member->name}}</a></td>
                                <td>{{$member->gender}}</td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('users/'.$member->id)}}" role="button" class="btn btn-sm btn-outline-info">View</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>--}}
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