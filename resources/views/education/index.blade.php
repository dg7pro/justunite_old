@extends('layouts.master')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of Education Levels
                    @can('manage_site')
                        <a href="{{url('educations/create')}}" role="button" class="btn btn-sm btn-outline-success">Create</a>
                    @endcan
                </h2>
                <div style="height: 75vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Education Level</th>
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($educations as $education)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>

                                <th scope="row">{{$education->id}}</th>
                                <td><a href="#">{{$education->level}}</a></td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('educations/'.$education->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
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
