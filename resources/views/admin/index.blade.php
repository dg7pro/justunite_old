@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('admin.partials.breadcrumbs')
            </div>
        </div>
        <div class="row">

            @can('manage_roles')
                <a href="{{url('/roles')}}">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="offer offer-success">
                        <div class="shape">
                            <div class="shape-text">
                                AWO
                            </div>
                        </div>
                        <div class="offer-content">
                            <h3 class="lead">
                                Manage Roles & Permissions
                            </h3>
                        </div>
                    </div>
                    </div>
                </a>
            @endcan

            @can('manage_users')
                <a href="{{url('/users')}}">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="offer offer-primary">
                            <div class="shape">
                                <div class="shape-text">
                                    AWO
                                </div>
                            </div>
                            <div class="offer-content">
                                <h3 class="lead">
                                    Manage & View Users
                                </h3>
                            </div>
                        </div>
                    </div>
                </a>
            @endcan

            @can('manage_site')
                <a href="{{url('/courses/admin')}}">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="offer offer-danger">
                            <div class="shape">
                                <div class="shape-text">
                                    AWO
                                </div>
                            </div>
                            <div class="offer-content">
                                <h3 class="lead">
                                    Courses & Study Materials
                                </h3>
                            </div>
                        </div>
                    </div>
                </a>
            @endcan

            @can('manage_site')
                <a href="{{url('/polls')}}">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="offer offer-warning">
                            <div class="shape">
                                <div class="shape-text">
                                    AWO
                                </div>
                            </div>
                            <div class="offer-content">
                                <h3 class="lead">
                                    Manage Polls & Options
                                </h3>
                            </div>
                        </div>
                    </div>
                </a>
            @endcan

           {{-- @can('manage_site')
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="offer offer-warning">
                        <div class="shape">
                            <div class="shape-text">
                                AWO
                            </div>
                        </div>
                        <div class="offer-content">
                            <h3 class="lead">
                                A warning offer
                            </h3>
                            <p>
                                And a little description.
                                <br> and so one
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

            @can('manage_site')
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="offer offer-info">
                        <div class="shape">
                            <div class="shape-text">
                                AWO
                            </div>
                        </div>
                        <div class="offer-content">
                            <h3 class="lead">
                                An new info offer
                            </h3>
                            <p>
                                And a little description.
                                <br> and so one
                            </p>
                        </div>
                    </div>
                </div>
            @endcan



            @can('manage_site')
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="offer offer-default">
                        <div class="shape">
                            <div class="shape-text">
                                AWO
                            </div>
                        </div>
                        <div class="offer-content">
                            <h3 class="lead">
                                A default offer
                            </h3>
                            <p>
                                And a little description.
                                <br> and so one
                            </p>
                        </div>
                    </div>
                </div>
            @endcan
--}}
        </div>

    </div>
@endsection
