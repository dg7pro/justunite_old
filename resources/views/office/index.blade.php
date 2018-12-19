@extends('layouts.master')

@section('content')
    <br>
    <div class="container">
        <br>
        @include('layouts.alerts.flash')
        @include('layouts.alerts.errors')
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of Posts
                    @can('manage_site')
                        <a href="{{url('offices/create')}}" role="button" class="btn btn-sm btn-outline-success">Create</a>
                    @endcan
                </h2>
                <div style="height: 75vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Office Name</th>
                            @can('manage_site')
                                <th scope="col">Create Office</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($offices as $office)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>

                                <th scope="row">{{$office->id}}</th>
                                <td><a href="#">{{$office->name}}</a></td>
                                @can('manage_site')
                                    <td>
                                        @if(count($office->constituencies))
                                            <a href="{{url('offices/'.$office->id.'/remove-post')}}" role="button" class="btn btn-sm btn-outline-info">Remove Posts</a>
                                            <a href="{{url('offices/'.$office->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        @else
                                            <a href="{{url('offices/'.$office->id.'/create-post')}}" role="button" class="btn btn-sm btn-outline-info">Create Posts</a>
                                            <a href="{{url('offices/'.$office->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endif
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
