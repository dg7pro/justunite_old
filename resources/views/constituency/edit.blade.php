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
                    <b>{{$constituency->state->name}}</b>

                    <b> | </b>
                    {{--1 for General, 2 for SC and 3 for General--}}
                    @if($constituency->pc_type == 2)
                        Type: Reserved for SC
                    @elseif($constituency->pc_type == 3)
                        Type: Reserved for ST
                    @else
                        Type: Un-Categorized General Seat
                    @endif
                </b>
            </p>
            <p><a class="btn btn-outline-dark" href="{{url('constituencies/'.$constituency->id.'/users')}}" role="button">All Members &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <br>
        @include('layouts.alerts.flash')
        @include('layouts.alerts.errors')
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <h2>
                    {{$constituency->pc_name}}
                    @can('manage_site')
                        <a href="{{url('constituencies/'.$constituency->id)}}" role="button" class="btn btn-sm btn-outline-info">View</a>
                    @endcan
                </h2>

                <form method="post" action="{{url('constituencies/'.$constituency->id)}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="details" id="notes-content" class="form-control" placeholder="Put Details ..." rows="10" >{{$constituency->details}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>

                <br>
                <br>

                <div>
                    @php
                        $previous = $constituency->id - 1 ;
                        $next = $constituency->id + 1 ;
                    @endphp

                    @if($previous == 0)
                        <a role="button" class="btn btn-outline-info btn-sm pull-left the-end" >&laquo; Previous </a>
                    @else
                        <a href="{{url('constituencies/'.$previous.'/edit')}}" role="button" class="btn btn-outline-info btn-sm pull-left" >&laquo; Previous </a>
                    @endif

                    @if($next > $constituencyCount)
                        <a role="button" class="btn btn-outline-info btn-sm pull-right the-end" >Next &raquo;</a>
                    @else
                        <a href="{{url('constituencies/'.$next.'/edit')}}" role="button" class="btn btn-outline-info btn-sm pull-right" >Next &raquo;</a>
                    @endif
                </div>

                {{--<h3>Electroates: </h3>
                <ul class="list-group">
                    <li class="list-group-item"><b><i>No. of Electroates: <span class="badge badge-pill badge-primary">{{number_format($constituency->total_electors)}}</span></i></b></li>
                    <li class="list-group-item"><b><i>Female Electroates: <span class="badge badge-pill badge-danger"> {{number_format($constituency->female_electors)}} </span></i></b></li>
                    <li class="list-group-item"><b><i>Male Electroates: <span class="badge badge-pill badge-success"> {{ number_format($constituency->male_electors) }}</span></i></b></li>
                </ul>
                <br>
                <br>
                <h3>Results of 2014 Elections:</h3>
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th scope="col">MP (Winner/RunnerUp)</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Party</th>
                        <th scope="col">Votes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Winner </th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                    </tr>
                    <tr>
                        <th scope="row">RunnerUp </th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                    </tr>
                    </tbody>
                </table>
                <div>
                    <b><i> Total Electors: <label class="text-primary"></label></i></b>  |
                    <b><i> Total No. of Voters: <label class="text-primary"></label></i></b>  |
                    <b><i> Turnout: <label class="text-primary"></label></i></b>
                </div>
                <br>
                <br>


                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Description & Notes:</h4>
                    <p>Each group has different voting power. User can belong to 2 or more groups, their voting power adds up.
                        Like any women can be member of Women Wing as well as ETF her total voting power will be 2+3=5 </p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>--}}

                <br>
                <br>
            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
        <br>
    </div>
@endsection

@section('extra-js')
    <script>
        CKEDITOR.replace( 'notes-content');
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

@endsection