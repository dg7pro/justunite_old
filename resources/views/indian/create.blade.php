@extends('layouts.master')

@section('content')
    <div class="container">
        <br>
        @include('layouts.alerts.flash')
        @include('layouts.alerts.errors')
        <div class="row">
            <div class="col-md-9">
                <br>
                <br>
                <h2>Create</h2>

                <form method="POST" action="{{url('indians')}}">
                    {{ csrf_field() }}
                    <br>

                    {{--Religion--}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Category:</label>
                            <select name="category_id" id="category" class="form-control">
                                <option selected value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Indian Name:</label>
                            <input type="text" name="name" id="name"  class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="suggested_by">Suggested By:</label>
                            <input type="text" name="suggested_by" id="suggested_by"  class="form-control">
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