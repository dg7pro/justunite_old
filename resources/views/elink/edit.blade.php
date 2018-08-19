@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br>
                <h2>
                    Edit Elink
                    {{--@can('manage_site')
                        <a href="{{url('problems/'.$problem->id)}}" role="button" class="btn btn-sm btn-outline-info">View</a>
                        <form method="POST" action="{{url('problems/'.$problem->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    @endcan--}}
                </h2>
                <form method="post" action="{{url('elinks/'.$elink->id)}}">

                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="hidden" name="indian_id" class="form-control" value="{{$elink->indian_id}}">
                    </div>

                    <div class="form-group">
                        <label for="title">Link:</label>
                        <input type="text" name="link" class="form-control" placeholder="External Link" value="{{$elink->link}}">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>

                </form>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection