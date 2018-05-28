@extends('layouts.master')

@section('meta-tags')
    <meta property="fb:app_id" content="131336294384114" />
@endsection

@section('content')
    @include('layouts.partials.fb-comment')
    <div class="jumbotron color4">
        <div class="container">
            <h1 class="display-3">{{$party->name}}</h1>
            <p>This page shows list of all the parliamentary constituency in India. Total their are 543 seats </p>
            <p><a href="#" role="button" class="btn btn-outline-warning" >Learn more &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>{{$party->name}}
                    @can('manage_site')
                        <a href="{{url('parties/'.$party->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>

                    @endcan
                </h2>
                {{--<img src="{{asset('images/parties/over-population.jpg')}}" alt="" width="100%">--}}
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($images as $image)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->iteration == 1 ? 'active' : ''}}"></li>
                            {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($images as $image)
                            <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : ''}}">
                                {{-- <img class="d-block w-100" src="{{asset('images/svg/'.$image->name)}}" alt="First slide">--}}
                                <img class="d-block w-100" src="{{asset('storage/'.$image->name)}}" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$image->heading}}</h5>
                                    <p>{{$image->caption}}</p>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="carousel-item">
                             <img class="d-block w-100" src="{{asset('images/svg/second.svg')}}" alt="Second slide">
                         </div>
                         <div class="carousel-item">
                             <img class="d-block w-100" src="{{asset('images/svg/third.svg')}}" alt="Third slide">
                         </div>--}}
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <br>
                <br>
                <div>
                    <b>{!! $party->details !!}</b>
                </div>
                <br>
                <table class="table table-bordered table-striped col-md-6">
                    <tr><th colspan="2">Party Factfile:</th></tr>
                    <tr><th>Name: </th><th>{{$party->name}}</th></tr>
                    <tr><th>Shortform: </th><th>{{$party->shortform}}</th></tr>
                    <tr><th colspan="2">Party Leadership:</th></tr>
                    <tr><th>Founder: </th><th>{{$party->founder}}</th></tr>
                    <tr><th>President: </th><th>{{$party->president}}</th></tr>
                    <tr><th>Leader: </th><th>{{$party->leader}}</th></tr>

                </table>
                <br>

                <div>
                    @php
                        $previous = $party->id - 1 ;
                        $next = $party->id + 1 ;
                    @endphp

                    @if($previous == 0)
                        <a role="button" class="btn btn-outline-info btn-sm pull-left the-end" >&laquo; Previous </a>
                    @else
                        <a href="{{url('parties/'.$previous)}}" role="button" class="btn btn-outline-info btn-sm pull-left" >&laquo; Previous </a>
                    @endif

                    @if($next > $partyCount)
                        <a role="button" class="btn btn-outline-info btn-sm pull-right the-end" >Next &raquo;</a>
                    @else
                        <a href="{{url('parties/'.$next)}}" role="button" class="btn btn-outline-info btn-sm pull-right" >Next &raquo;</a>
                    @endif

                    {{--<ul>
                        <li><a href="#" role="button" class="pull-left btn btn-default btn-sm">Previous</a></li>
                        <li><a href="#" role="button" class="pull-right btn btn-default btn-sm">Next</a></li>
                    </ul>--}}
                </div>
                @can('manage_site')
                    <hr>
                    <div>
                        <h3>Upload Image</h3>
                        <br>
                        <form method="post" action="{{url('parties/'.$party->id.'/upload-image')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputFile">Your Image:</label>
                                <input type="file" name="image" class="form-control-file" id="image" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input.
                                    It's a bit lighter and easily wraps to a new line.</small>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Heading:</label>
                                <div class="">
                                    <input class="form-control" type="text" name="heading" value="Artisanal kale" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Caption:</label>
                                <div class="">
                                    <input class="form-control" type="text" name="caption" value="Artisanal kale" id="example-text-input">
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Image</button>
                            </div>
                        </form>
                    </div>
                    <br><br>
                    @if($images->count())
                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Del</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $image)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <th scope="row">{{ $image->name }}</th>
                                        <td scope="row">
                                            <a href="{{url('images/'.$image->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        </td>
                                        <td scope="row">
                                            <form method="POST" action="{{url('images/'.$image->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Del</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endcan
                <br><br>
                <div class="fb-comments" data-href="http://www.justunite.org/parties/1" data-width="100%" data-numposts="5"></div>
            </div>

            @include('layouts.partials.sidemenu')
        </div>
    </div>
@endsection

@section('extra-js')
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
    <script>
        function ConfirmDelete(){
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
