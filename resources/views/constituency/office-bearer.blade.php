@extends('layouts.master')

@section('content')
    <div class="container">
        <br><br>
        @include('layouts.alerts.success')
        @include('layouts.alerts.error')
        <div class="row">
            <div class="col-md-9">

                <h2>Constituency : <a href="{{url('constituencies/'.$constituency->id)}}" class="text-primary">{{$constituency->pc_name}}</a> </h2>
                <ul class="list-group">
                    @foreach($constituency->filled as $office)
                        {{--<li class="list-group-item">{{$office->name. ' : '}}
                            @if($office->pivot->user_id == null or $office->pivot->active == 0)
                                <a href="{{url('offices/'.$office->id.'/apply-for')}}" role="button" class="btn btn-sm btn-outline-success">Apply</a>
                            @else
                                <a href="{{url('users/'.$office->pivot->user_id)}}" class="text-primary">{{ $office->pivot->user_name. ' (In office)'}}</a>{{' (In office)'}}
                            @endif
                        </li>--}}

                        <li class="list-group-item">{{$office->name. ' : '}}
                            <a href="{{url('users/'.$office->pivot->user_id)}}" class="text-primary">{{ $office->pivot->user_name}}</a>
                        </li>
                    @endforeach
                </ul>


                <br><br><br>


                <h4 class="text-primary">We need members:</h4>
                <ul class="list-group">
                    @foreach($constituency->vacant as $office)
                        {{--<li class="list-group-item">{{$office->name. ' : '}}
                            @if($office->pivot->user_id == null or $office->pivot->active == 0)
                                <a href="{{url('offices/'.$office->id.'/apply-for')}}" role="button" class="btn btn-sm btn-outline-success">Apply</a>
                            @else
                                <a href="{{url('users/'.$office->pivot->user_id)}}" class="text-primary">{{ $office->pivot->user_name. ' (In office)'}}</a>{{' (In office)'}}
                            @endif
                        </li>--}}

                        <li class="list-group-item">{{$office->name. ' : '}}
                            <a href="{{url('offices/'.$office->id.'/apply-for')}}" role="button" class="btn btn-sm btn-outline-success">Apply</a>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>

        </div>
        <br>
    </div>
@endsection

