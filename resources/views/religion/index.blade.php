@extends('layouts.master')

@section('content')

   <br>
   <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>List of Religions</h2>
                <div style="height: 75vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Religion Name</th>
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($religions as $religion)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>

                                <th scope="row">{{$religion->id}}</th>
                                <td><a href="#">{{$religion->name}}</a></td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('religions/'.$religion->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
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
