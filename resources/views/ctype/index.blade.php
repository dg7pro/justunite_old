@extends('layouts.master')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>Type of Constituencies</h2>
                <div style="height: 75vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">C Type</th>
                            <th scope="col">Description</th>
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($ctypes as $ctype)
                            <tr>
                                <th scope="row">{{$ctype->id}}</th>
                                <td><a href="#">{{$ctype->name}}</a></td>
                                <td><a href="#">{{$ctype->description}}</a></td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('ctypes/'.$ctype->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
@endsection
