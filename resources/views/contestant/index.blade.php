@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>List of Contestants</h2>
                {{$contestants}}
                {{--@foreach($states as $state)
                    {{$state->name}}
                @endforeach--}}
            </div>
        </div>
    </div>
@endsection
