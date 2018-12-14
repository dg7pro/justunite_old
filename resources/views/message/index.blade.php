@extends('layouts.master')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of Message Notifications
                    @can('manage_site')
                        <a href="{{url('messages/create')}}" role="button" class="btn btn-sm btn-outline-success">Create</a>
                    @endcan
                </h2>
                <div style="height: 75vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Messages</th>
                            <th scope="col">Send</th>
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($messages as $message)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>

                                <th scope="row">{{$message->id}}</th>
                                <td><a href="{{url('messages/'.$message->id)}}">{{$message->subject}}</a></td>
                                <td><a href="#">{{$message->send}}</a></td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('messages/'.$message->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
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
