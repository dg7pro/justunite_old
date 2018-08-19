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
                    {{$indian->name}}
                    @can('manage_site')
                        <a href="{{url('indians/'.$indian->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                    @endcan
                </h2>
                <p>
                    <mark class="font-italic">
                        To know more about {{$indian->name}} click on below external links:
                    </mark>
                </p>
                {{--<div class="alert alert-warning" role="alert">

                </div>--}}

                <ul class="list-group">
                    @foreach($indian->elinks as $elink)
                        <li class="list-group-item">
                            <a href="{{$elink->link}}" class="text-primary">{{$elink->link}}</a>
                            @can('manage_site')
                                <form method="POST" class="d-inline" action="{{url('elinks/'.$elink->id)}}" onsubmit="return ConfirmDelete()">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    {{--<button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>--}}
                                    <button type="submit" class="btn btn-link text-danger" style="padding-bottom: 1ch">Del</button>
                                </form>
                                <div class="d-inline">
                                    {{--<a href="{{url('elinks/'.$elink->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-warning">Edit</a>--}}
                                    <a href="{{url('elinks/'.$elink->id.'/edit')}}" role="button" class="text-warning">Edit</a>
                                </div>
                            @endcan
                        </li>
                    @endforeach
                </ul>

                <br>
                <br>
                @can('manage_site')
                    <br><br>
                    <h3>Add E-Links</h3>
                    <form method="POST" action="{{url('elinks')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-8">
                                <input type="hidden" name="indian_id" id="indian_id" value="{{$indian->id}}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="link">External Link</label>
                                <input type="text" name="link" id="link"  class="form-control">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-info">Submit</button>
                    </form>
                @endcan
            </div>
            <br>
            <br>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
                {{--@include('layouts.partials.dashboard-menu')--}}
            </div>

        </div>
    </div>
@endsection

@section('extra-js')

    <script>
        function ConfirmDelete(){
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

@endsection