@extends('layouts.master')

@section('content')

    <div class="jumbotron color4">
        <div class="container">
            <h1 class="display-3">Parties</h1>
            <p>This page shows list of all the important political parties in India.</p>
            <p>
                <a href="{{$whatsapp}}" role="button" class="btn btn-outline-warning" ><i class="fa fa-whatsapp"> Join Whatsapp</i></a>
                {{--<a href="#" role="button" class="btn btn-outline-warning" >Vote &raquo;</a></p>--}}
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
                            <td>
                                <a href="{{url('parties/'.$party->id)}}"><b>{{$party->name}}</b></a>

                            </td>
                            <td>{{$party->votes_count}}</td>
                            <td>
                                <a class="btn btn-info" href="{{ url('loginToVoteParty') }}">Vote</a>
                            </td>
                            {{--@can('manage_site')
                                <td>
                                    <a href="{{url('parties/'.$party->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                </td>
                            @endcan--}}

                        </tr>
                        @else
                            @if($party->id == $receivedVotePartyId)
                                {{--<tr style="background-color: #0d3625">--}}
                                <tr style="background-color: #06b0cf">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{url('parties/'.$party->id)}}"><b>{{$party->name}}</b></a>
                                    </td>
                                    <td>{{$party->votes_count}}</td>
                                    <td >
                                        <button type="submit" class="btn btn-default btn-xs disabled">Vote</button>
                                    </td>
                                    @can('manage_site')
                                        <td>
                                            <a href="{{url('parties/'.$party->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        </td>
                                    @endcan
                                </tr>
                            @else
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{url('parties/'.$party->id)}}"><b>{{$party->name}}</b></a>
                                    </td>
                                    <td>{{$party->votes_count}}</td>
                                    <td>
                                        <form method="post" action="{{url('parties/vote/'.$party->id)}}" class="form-inline" onsubmit="{{$receivedVotePartyId != null ? 'ConfirmVoteChange()' : ''}}">
                                            {{csrf_field()}}
                                            <input name="currentOption" type="hidden" value="{{$receivedVotePartyId}}">
                                            <button type="submit" id="vote" class="btn btn-info btn-xs">Vote</button>
                                        </form>
                                    </td>
                                    @can('manage_site')
                                        <td>
                                            <a href="{{url('parties/'.$party->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        </td>
                                    @endcan
                                </tr>
                            @endif
                        @endif

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
