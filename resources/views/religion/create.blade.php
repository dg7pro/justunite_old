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
                <h2>Create Religion</h2>

                <form method="POST" action="{{url('religions')}}">
                    {{ csrf_field() }}

                    {{--Religion--}}

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Religion Name:</label>
                            <input type="text" name="name" id="name"  class="form-control">
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
            <br>
            <br>
            @include('layouts.partials.dashboard-menu')

        </div>
    </div>
@endsection