@extends('layouts.master')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>List of Marital Status</h2>
                <div style="height: 75vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Marital Status</th>
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($maritals as $marital)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>

                                <th scope="row">{{$marital->id}}</th>
                                <td><a href="#">{{$marital->status}}</a></td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('maritals/'.$marital->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            @include('layouts.partials.sidemenu')
        </div>
    </div>

    <br>
    <br>
    <br>
@endsection
