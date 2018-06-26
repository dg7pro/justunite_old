@extends('layouts.master')

@section('content')

    <br>
    <br>
    <div class="container">
        <br>
        @include('layouts.alerts.success')
        @include('layouts.alerts.error')
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of Age Groups
                    @can('manage_site')
                        <a href="{{url('ages/create')}}" role="button" class="btn btn-sm btn-outline-success">Create</a>
                    @endcan
                </h2>
                <div style="height: 75vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Age Groups</th>
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($ages as $age)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>

                                <th scope="row">{{$age->id}}</th>
                                <td><a href="#">{{$age->group}}</a></td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('ages/'.$age->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
@endsection
