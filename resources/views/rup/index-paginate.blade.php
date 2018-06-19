@extends('layouts.master')

@section('extra-css')
    <style>
        .wrapper > ul#results li {
            margin-bottom: 1px;
            background: #f9cd9f;
            padding: 20px;
            list-style: none;
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

                <div class="wrapper">
                    <!-- results appear here -->
                    <ul id="results">
                        @foreach ($rups as $rup)
                            <li>
                                <strong>{{ $rup->id .' '. $rup->name . ':' }}</strong>
                                <br>{{ $rup->headquarter }}
                            </li>
                        @endforeach
                    </ul>
                </div>


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


                <br><br>
                {{ $rups->links('vendor.pagination.bootstrap-4') }}
                <br><br>
            </div>
            <div class="col-md-2"></div>
            @include('layouts.partials.sidemenu')
        </div>
    </div>
@endsection


