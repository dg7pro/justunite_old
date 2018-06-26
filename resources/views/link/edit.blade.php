@extends('layouts.master')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                @include('layouts.alerts.success')
                @include('layouts.alerts.error')
                <h2>Edit Links</h2>
                    <form method="POST" action="{{url('links/'.$link->id)}}">

                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="answer">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$link->name}}">
                        </div>

                        <div class="form-group">
                            <label for="link">Link:</label>
                            <input type="text" name="link" class="form-control" placeholder="Put your Option" value="{{$link->link}}">
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>

                    </form>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
@endsection
