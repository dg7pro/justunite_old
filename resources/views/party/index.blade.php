@extends('layouts.master')

@section('content')

    <div class="jumbotron color4">
        <div class="container">
            <h1 class="display-3">Parties</h1>
            <p>This page shows list of all the important political parties in India.</p>
            <p>
                <a href="{{$whatsapp}}" role="button" class="btn btn-outline-warning" ><i class="fa fa-whatsapp"></i> Join Whatsapp</a>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of Parties
                    <a href="{{$whatsapp}}" role="button" class="btn btn-outline-success" ><i class="fa fa-whatsapp"> Join Whatsapp</i></a>
                </h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Parties</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Select</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                            {{--<th scope="col">Del</th>--}}
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parties as $party)

                        @if(Auth::guest())
                            <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th class="text-primary"><a href="{{url('parties/'.$party->id)}}">{{$party->name}}</a></th>
                            <th class="text-primary">{{$party->votes_count}}</th>
                            <td>
                                <a class="btn btn-info" href="{{ url('loginToVoteParty') }}"><i class="fa fa-thumbs-up" style="font-size:16px"></i> Vote</a>
                            </td>

                        </tr>
                        @else
                            @if($party->id == $receivedVotePartyId)
                                {{--<tr style="background-color: #0d3625">--}}
                                <tr style="background-color: #06b0cf">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <th class="text-primary"><a href="{{url('parties/'.$party->id)}}">{{$party->name}}</a></th>
                                    <th class="text-primary">{{$party->votes_count}}</th>
                                    <th><button type="submit" class="btn btn-default btn-xs disabled"> Voted</button></th>
                                    @can('manage_site')
                                        <th>
                                            <a href="{{url('parties/'.$party->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        </th>
                                    @endcan
                                </tr>
                            @else
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <th class="text-primary">
                                        <a href="{{url('parties/'.$party->id)}}">{{$party->name}}</a>
                                    </th>
                                    <th class="text-primary">{{$party->votes_count}}</th>
                                    <th>
                                        <form method="post" action="{{url('parties/vote/'.$party->id)}}" class="form-inline" onsubmit="{{$receivedVotePartyId != null ? 'ConfirmVoteChange()' : ''}}">
                                            {{csrf_field()}}
                                            <input name="currentOption" type="hidden" value="{{$receivedVotePartyId}}">
                                            <button type="submit" id="vote" class="btn btn-info btn-xs"><i class="fa fa-thumbs-up" style="font-size:16px"></i> Vote</button>
                                        </form>
                                    </th>
                                    @can('manage_site')
                                        <th>
                                            <a href="{{url('parties/'.$party->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        </th>
                                    @endcan
                                </tr>
                            @endif
                        @endif

                    @endforeach

                    </tbody>
                </table>

                <div>
                @if(Auth::guest())
                    <!-- Button trigger modal -->

                       {{-- <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-list" style="font-size:16px"></i> View list
                        </button>--}}

                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-list"> </i> List of Other Unrecognized Parties
                        </button>



                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Login or Register</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                                            <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                                        </div>
                                    </div>
                                    {{--<div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>--}}
                                </div>
                            </div>
                        </div>

                    @else
                        {{--<a href="{{url('constituencies/'.$constituency->id.'/contestants')}}" role="button" class="btn btn-sm btn-outline-warning">
                            <i class="fa fa-list" style="font-size:16px"></i> View list</a>--}}
                        <a href="{{ url('rups') }}" role="button" class="btn btn-primary btn-lg" ><i class="fa fa-list"> </i> List of Other Unrecognized Parties</a>
                    @endif
                </div>
                <br>
                <br>
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
        function ConfirmVoteChange(){

            var x = confirm("You have already voted, do you want to change your vote?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
