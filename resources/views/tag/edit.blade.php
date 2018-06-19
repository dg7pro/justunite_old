@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <br><br>
                <h2>
                    Edit Religion
                    @can('manage_site')
                        <a href="{{url('tags')}}" role="button" class="btn btn-sm btn-outline-info">View All</a>
                    @endcan
                </h2>
                <form method="post" action="{{url('tags/'.$tag->id)}}">

                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Tag Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Name of Tag" value="{{$tag->name}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="order">Order:</label>
                            <select name="order" id="order" class="form-control">
                                <option selected value="">Select Order...</option>
                                @php
                                    $xs = [1,2,3,4,5,6,7,8,9,10,11];
                                @endphp
                                @foreach($xs as $x)
                                    <option value="{{$x}}" {{ $tag->order == $x ? 'selected="selected"' : '' }}>{{$x}}</option>
                                @endforeach
                            </select>
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

