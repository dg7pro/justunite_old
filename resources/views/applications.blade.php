@extends('layouts.master')

@section('content')
    <div class="container">
        <br><br>
        @include('layouts.alerts.flash')
        @include('layouts.alerts.errors')
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-primary">Applications:</h3>
                @foreach($constituencies as $constituency)
                    @if(!$constituency->applications ->isEmpty())
                        <h4>{{$constituency->pc_name}}</h4>
                        <ul class="list-group">
                            @foreach($constituency->applications as $application)
                                <li class="list-group-item">{{$application->name. ' : '}}
                                    <a href="{{url('users/admin-show/'.$application->pivot->user_id)}}" class="text-primary">{{ $application->pivot->user_name}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <br>
                    @endif
                @endforeach

            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>

        </div>
        <br>
    </div>
@endsection

