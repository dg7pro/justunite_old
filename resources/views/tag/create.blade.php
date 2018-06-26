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
                <h2>Create Tags</h2>

                <form method="POST" action="{{url('tags')}}">
                    {{ csrf_field() }}

                    {{--Tags--}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Tags Name:</label>
                            <input type="text" name="name" id="name"  class="form-control" placeholder="Tag's name...">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="order">Order:</label>
                            <select name="order" id="order" class="form-control">
                                <option selected value="">Select Order...</option>
                                @php
                                    $xs = [1,2,3,4,5,6,7,8,9,10,11];
                                @endphp
                                @foreach($xs as $x)
                                    <option value="{{$x}}">{{$x}}</option>
                                @endforeach
                            </select>
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
            <div class="col-md-3">
                @include('layouts.partials.dashboard-menu')
            </div>

        </div>
    </div>
@endsection