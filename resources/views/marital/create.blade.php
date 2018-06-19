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
                <h2>Create Marital Status</h2>

                <form method="POST" action="{{url('maritals')}}">
                    {{ csrf_field() }}

                    {{--Tags--}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="status">Marital Status:</label>
                            <input type="text" name="status" id="status"  class="form-control" placeholder="Marital status...">
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