@extends('layouts.master')

@section('content')

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <h2>List of Languages</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">State/UT</th>
                        <th scope="col">Languages</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                        @endcan

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($states as $state)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td><a href="{{url('states/'.$state->id)}}">{{$state->name}}</a></td>
                            <td>
                                @foreach($state->languages as $language)
                                    {{$language->name.', '}}
                                @endforeach
                                {{'etc.'}}
                            </td>
                            @can('manage_site')
                                <th>
                                    <a href="{{url('states/'.$state->id.'/list-languages')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                </th>
                            @endcan
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                @include('layouts.partials.apply')
                <br>

            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>
@endsection
