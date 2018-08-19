@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br>
                <h2>
                    Edit Indian
                    @can('manage_site')
                        <a href="{{url('indians/'.$indian->id)}}" role="button" class="btn btn-sm btn-outline-info">View</a>
                        <form method="POST" action="{{url('indians/'.$indian->id)}}" class="d-inline" onsubmit="return ConfirmDelete()">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    @endcan
                </h2>

                <form method="POST" action="{{url('indians/'.$indian->id)}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <br>

                    {{--Religion--}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Category:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option selected value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ $indian->category_id == $category->id ? 'selected="selected"' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Indian Name:</label>
                            <input type="text" name="name" id="name" value="{{$indian->name}}" placeholder="Enter Name" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="suggested_by">Suggested By:</label>
                            <input type="text" name="suggested_by" id="suggested_by" value="{{$indian->suggested_by}}" placeholder="Suggested By" class="form-control">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-outline-info">Update</button>
                </form>

                <br>
                <br>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection