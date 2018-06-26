@extends('layouts.master')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>List of State || Ruling Party</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">State</th>
                        <th scope="col">Ruling Party</th>
                        <th scope="col">Opposition</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                        @endcan

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($states as $state)
                        <tr>
                            <td scope="row">{{$state->id}}</td>
                            <td><a href="{{ url('states/'.$state->id) }}">{{ $state->name }}</a></td>
                            <td>
                                @if($state->ruling)
                                    <a href="{{url('parties/'.$state->ruling->id)}}"><b class="text-primary">{{$state->ruling->abbreviation}}</b></a>
                                @else
                                    {!! '<i>null</i>' !!}
                                @endif
                            </td>
                            <td>
                                {{--{!! $state->opposition->abbreviation or '<i>null</i>' !!}--}}
                                @if($state->opposition)
                                    <a href="{{url('parties/'.$state->opposition->id)}}"><b class="text-primary">{{$state->opposition->abbreviation}}</b></a>
                                @else
                                    {!! '<i>null</i>' !!}
                                @endif

                            </td>
                            @can('manage_site')
                                <td>
                                    <a href="{{ url('states/'.$state->id.'/edit') }}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                </td>
                            @endcan
                        </tr>
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
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>
@endsection
