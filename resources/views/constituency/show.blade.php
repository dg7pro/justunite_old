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
                    <b>{{$constituency->state->name2}}</b>

                <b> | </b>
                {{--1 for General, 2 for SC and 3 for General--}}
                @if($constituency->ctype_id == 2)
                    Type: Reserved for SC
                @elseif($constituency->ctype_id == 3)
                    Type: Reserved for ST
                @else
                    Type: General Seat {{--Un-Categorized--}}
                @endif
            </b>
            </p>
            <p>
                <a class="btn btn-outline-dark" href="{{url('constituencies/'.$constituency->id.'/members')}}" role="button">Members &raquo;</a>
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
                <h4 class="text-primary">Results of 2014 Elections:
                    @if(Auth::guest())
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-list" style="font-size:16px"></i> View list
                        </button>
                        @include('layouts.partials.login-modal')
                    @else
                        <a href="{{url('constituencies/'.$constituency->id.'/contestants')}}" role="button" class="btn btn-sm btn-outline-warning">
                            <i class="fa fa-list" style="font-size:16px"></i> View list</a>
                    @endif
                </h4>
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
                                <th scope="row">{{$contestant->name or 'null'}}</th>
                                <th scope="row">{{$contestant->gender->name or 'null'}}</th>
                                <th scope="row">{{$contestant->party or 'null'}}</th>
                                <th scope="row">{{$contestant->votes or 'null'}}</th>
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
                                <b><i> Total Electors: <label class="text-primary">{{number_format($constituency->electors)}}</label></i></b>
                            </li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Total No. of Voters: <label class="text-primary">{{number_format($constituency->voters)}}</label></i></b>
                            </li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Turnout: <label class="text-primary">{{($constituency->turnout*100).'%' }}</label></i></b>
                            </li>
                        </ul>
                    </div>
                    <br class="visible-xs">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item active">Contestants</li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Nominations: <label class="text-primary">{{$constituency->nominations}}</label></i></b>
                            </li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Contestants: <label class="text-primary">{{$constituency->contestants}}</label></i></b>
                            </li>
                            <li class="list-group-item list-group-item-warning">
                                <b><i> Forfeit Candidates: <label class="text-primary">{{$constituency->forfeited }}</label></i></b>
                            </li>
                        </ul>
                    </div>

                </div>
                @if($memCount)
                    <br>
                    <h3>
                        Our Members
                        @if(Auth::guest())
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-list" style="font-size:16px"></i> View list
                            </button>
                            @include('layouts.partials.login-modal')
                        @else
                            <a href="{{url('constituencies/'.$constituency->id.'/members')}}" role="button" class="btn btn-sm btn-outline-info">
                                <i class="fa fa-list" style="font-size:16px"></i> View list</a>
                        @endif
                    </h3>
                    <div {{--style="height: 30vh; overflow: auto"--}}>
                        <table class="table table-striped table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Opinion</th>
                                <th scope="col">Vote</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($members as $member)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>
                                        @if(file_exists(public_path().'/upload/'.$member->uuid.'.png'))
                                            <img src="{{asset('upload/'.$member->uuid.'.png')}}" alt="Profile Pic" class="img-circle" width="50" height="50">
                                            <br>
                                        @else
                                            <img data-name="{{ $member->name }}" class="demo img-responsive" width="50" height="50"/>
                                            <br>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('users/'.$member->id)}}" class="font-weight-bold text-primary">{{$member->name}}</a>
                                        <div class="font-italic">Likes: {{$member->known_by_count or 'null'}}</div>
                                    </td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$member->id}}"><i class="fa fa-comments fa-2x"></i></a></td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{$member->opinion->matter or 'Not Written'}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <td>
                                        @if(Auth::guest())
                                            <a class="btn btn-info" href="{{ url('loginToContinue')}}"><i class="fa fa-thumbs-up" style="font-size:16px"></i> Vote</a>
                                            @php
                                                Session(['lastUrl' => Request::fullUrl()])
                                            @endphp
                                        @else
                                            <a class="btn btn-info" href="{{ url('constituencies/'.$constituency->id.'/members') }}"><i class="fa fa-thumbs-up" style="font-size:16px"></i> Vote</a>
                                        @endif
                                        {{--<a href="{{url('users/'.$member->id)}}" role="button" class="btn btn-sm btn-outline-info">View</a>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                @endif

                {{--<h4 class="text-primary">JU {{$constituency->pc_name}} Leadership:</h4>
                <div --}}{{--style="height: 30vh; overflow: auto"--}}{{-->
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">S No.</th>
                            <th scope="col">Position</th>
                            <th scope="col">Office Bearer</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($constituency->bearers as $bearer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><b class="text-primary">{{$bearer->name}}</b></td>
                                <td>{{$bearer->pivot->user_id or 'vacant'}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                --}}

                {{--<div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Description & Notes:</h4>
                    <p>Each group has different voting power. User can belong to 2 or more groups, their voting power adds up.
                        Like any women can be member of Women Wing as well as ETF her total voting power will be 2+3=5 </p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>--}}
                <div>
                    @php
                        $previous = $constituency->id - 1 ;
                        $next = $constituency->id + 1 ;
                    @endphp

                    @if($previous == 0)
                        <a role="button" class="btn btn-outline-info btn-sm pull-left the-end" >&laquo; Previous </a>
                    @else
                        <a href="{{url('constituencies/'.$previous)}}" role="button" class="btn btn-outline-info btn-sm pull-left" >&laquo; Previous </a>
                    @endif

                    @if($next > $constituencyCount)
                        <a role="button" class="btn btn-outline-info btn-sm pull-right the-end" >Next &raquo;</a>
                    @else
                        <a href="{{url('constituencies/'.$next)}}" role="button" class="btn btn-outline-info btn-sm pull-right" >Next &raquo;</a>
                    @endif
                </div>
                <br>
                <br>
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
            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
                @include('layouts.partials.side-add')
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
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
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <script type="text/javascript">
        $('.the-end').on('click', function () {
            $.alert({
                title: 'The End !',
                content: 'You have reached the edge !',
                type: 'red'
            });
        });
    </script>

    <script src="{{asset('js/initial.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.demo').initial({
                name: 'Name', // Name of the user
                charCount: 1, // Number of characherts to be shown in the picture.
                textColor: '#ffffff', // Color of the text
                seed: 1, // randomize background color
                height: 100,
                width: 100,
                fontSize: 70,
                fontWeight: 500,
                fontFamily: 'HelveticaNeue-Light,Helvetica Neue Light,Helvetica Neue,Helvetica, Arial,Lucida Grande, sans-serif',
                radius: 50,
            });
        })
    </script>
@endsection