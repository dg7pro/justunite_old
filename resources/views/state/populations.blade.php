@extends('layouts.master')

@section('content')
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>List of State || Literacy %</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">State</th>
                        <th scope="col">Population</th>

                        <th scope="col">Rank</th>
                        <th scope="col">Density</th>
                        <th scope="col">Sex Ratio</th>

                        <th scope="col">Urban</th>
                        <th scope="col">Rural</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($states as $state)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td><a href="{{url('states/'.$state->id)}}">{{$state->name}}</a></td>
                            <td>{{$state->population}}</td>
                            <td>{{$state->rank}}</td>
                            <td>{{$state->density}}</td>
                            <td>{{$state->sex_ratio}}</td>

                            <td>{{$state->upo}}</td>
                            <td>{{$state->rpo}}</td>
                            @can('manage_site')
                                <td>
                                    <a href="{{url('states/'.$state->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include('layouts.partials.apply')
                <br>
            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>
@endsection
