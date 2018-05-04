@extends('layouts.master')

@section('content')
    <div class="jumbotron color5">
        <div class="container">
            <h1 class="display-3">{{$state->name}}</h1>
            <p>This page shows list of all the candidates running election from parliamentary constituency. The candidate which peoples of  select will be our candidate for 2019 General Elections from </p>
            {{--<p>
                <a class="btn btn-outline-dark btn-lg" href="{{url('states/'.Auth::User()->state_id.'/constituencies')}}" role="button">All Members &raquo;</a>
            </p>--}}
            <p>
                <a class="btn btn-outline-dark btn-lg" href="{{url('states/'.$state->id.'/members')}}" role="button">All Members &raquo;</a>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>{{$state->name2}}
                    @can('manage_site')
                        <a href="{{url('states/'.$state->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                    @endcan
                </h2>
                <div style="height: 70vh; overflow: auto">
                    <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col" colspan="2" class="text-primary">The State of {{$state->name2}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr><th>Name: </th><th>{{$state->name2}}</th></tr>
                        <tr><th>Capital: </th><th>{{$state->capital}}</th></tr>
                        <tr><th>Population: </th><th>{{number_format($state->population)}}</th></tr>
                        <tr><th>Language: </th><th>
                                @foreach($state->languages as $language)
                                   {{-- <a href="{{url('languages/'.$language->id)}}"></a>--}}
                                    {{$language->name.',   '}}
                                @endforeach
                                {{'etc'}}
                                @can('manage_site')
                                    <a href="{{url('states/'.$state->id.'/list-languages')}}" role="button" class="btn btn-sm btn-outline-info">Attach</a>
                                @endcan

                            </th></tr>
                        <tr><th>Literacy: </th><th>{{$state->literacy. '%'}}</th></tr>
                        {{--<tr><th>Income: </th><th></th></tr>--}}
                        <tr><th>Lok Sabha Seats(PC): </th><th>{{$state->pc.' seats'}}</th></tr>
                        <tr><th>Vidhan Sabha Seats(AC): </th><th>{{$state->ac.' seats'}}</th></tr>
                        <tr><th>Chief Minister: </th><th>{{$state->cm}}</th></tr>
                       {{-- <tr><th>Ruling Party: </th><th><a href="{{url('parties/'.$state->ruling->id)}}" class="text-primary">{{$state->ruling->name}}</a></th></tr>
                        <tr><th>Opposition Party: </th><th><a href="{{url('parties/'.$state->ruling->id)}}" class="text-primary">{{$state->opposition->name}}</a></th></tr>--}}
                        <tr><th>Governor: </th><th>{{$state->governor}}</th></tr>
                        {{--<tr><th>CEO: </th><th></th></tr>--}}
                    </tbody>
                </table>
                </div>
                <br>
                <h3>Active Parties in {{$state->name2}}
                    @can('manage_site')
                        <a href="{{url('states/'.$state->id.'/list-parties')}}" role="button" class="btn btn-sm btn-outline-info">Attach</a>
                    @endcan
                </h3>
                <div style="height: 50vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S No.</th>
                            <th scope="col">Symbol</th>
                            <th scope="col">Party Name</th>
                            <th scope="col">Shortform</th>
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        {{--@foreach($parties as $party)--}}
                        @foreach($state->parties as $party)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><img src="{{asset('icons/'.$party->abbreviation.'.jpg')}}"></td>
                                <td><a href="{{url('parties/'.$party->id)}}"><b class="text-primary">{{$party->name}}</b></a></td>
                                <td><a href="{{url('parties/'.$party->id)}}"><b class="text-primary">{{$party->abbreviation}}</b></a></td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('parties/'.$party->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <h3>Loksabha Constituencies</h3>
                <div style="height: 50vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Constituency Name</th>
                            <th scope="col">Type</th>
                            {{--<th scope="col">State</th>--}}
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($state->constituencies as $constituency)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><a href="{{url('constituencies/'.$constituency->id)}}"><b class="text-primary">{{$constituency->pc_name}}</b> </a></td>
                                <td><b data-toggle="tooltip" title="{{$constituency->ctype->description}}" class="text-primary">{{$constituency->ctype->name}}</b></td>
                                {{--<td><a href="{{url('states/'.$state->id)}}">{{$state->name2}}</a></td>--}}
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('constituencies/'.$constituency->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
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

@section('extra-js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

@endsection