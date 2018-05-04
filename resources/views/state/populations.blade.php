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

            @include('layouts.partials.sidemenu')
        </div>
    </div>
@endsection
