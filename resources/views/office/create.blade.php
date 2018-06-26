@extends('layouts.master')

@section('content')

    <div class="container">
        <br>
        @include('layouts.alerts.success')
        @include('layouts.alerts.error')
        <div class="row">
            <div class="col-md-9">
                <br>
                <br>
                <h2>
                    Create Office
                    @can('manage_site')
                        <a href="{{url('offices')}}" role="button" class="btn btn-sm btn-outline-success">Offices</a>
                    @endcan

                </h2>

                <form method="POST" action="{{url('offices')}}">
                    {{ csrf_field() }}

                    {{--Tags--}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Office Name:</label>
                            <input type="text" name="name" id="name"  class="form-control" placeholder="Office name...">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-outline-info">Submit</button>
                </form>

                <br>
                <br>


                <br>
                <br>
            </div>

            <div class="col-md-3">
                @include('layouts.partials.dashboard-menu')
            </div>

        </div>
    </div>
@endsection