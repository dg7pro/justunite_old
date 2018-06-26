@extends('layouts.master')


@section('extra-css')
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">--}}
    <style>
        .wrapper > ul#results li {
            margin-bottom: 1px;
            background: #f9cd9f;
            padding: 20px;
            list-style: none;
        }
        .ajax-loading{
            text-align: center;
        }
    </style>

@endsection

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
            <div class="col-md-7">
                <h2 class="text-primary">
                    Registered Unrecognized Parties
                </h2>

                {{--<table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Party Name</th>
                        <th scope="col">Headquarter</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($rups as $rup)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$rup->name}}</td>
                                <td>{{$rup->headquarter}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>--}}

                <div class="wrapper">
                    <ul id="results"><!-- results appear here --></ul>
                    <div class="ajax-loading"><img src="{{ asset('images/loading.gif') }}" /></div>
                </div>
                <br>
                <br>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    {{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script>
        var page = 1; //track user scroll as page number, right now page number is 1
        load_more(page); //initial content load
        $(window).scroll(function() { //detect page scroll
            if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
                page++; //page number increment
                load_more(page); //load content
            }
        });
        function load_more(page){
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    datatype: "html",
                    beforeSend: function()
                    {
                        $('.ajax-loading').show();
                    }
                })
                .done(function(data)
                {
                    if(data.length == 0){
                        console.log(data.length);

                        //notify user if nothing to load
                        $('.ajax-loading').html("No more records!");
                        return;
                    }
                    $('.ajax-loading').hide(); //hide loading animation once data is received
                    $("#results").append(data); //append data into #results element
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    alert('No response from server');
                });
        }
    </script>

@endsection
