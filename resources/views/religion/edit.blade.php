@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <br><br>
                <h2>
                    Edit Religion
                    @can('manage_site')
                        <a href="{{url('religions/'.$religion->id)}}" role="button" class="btn btn-sm btn-outline-info">View</a>
                    @endcan
                </h2>
                <form method="post" action="{{url('religions/'.$religion->id)}}">

                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Religion Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Name of Religion" value="{{$religion->name}}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>

                </form>
                <br>
                <br>
            </div>
            <br>
            @include('layouts.partials.dashboard-menu')
        </div>
    </div>
@endsection

