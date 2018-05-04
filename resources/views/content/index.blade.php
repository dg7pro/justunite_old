@extends('layouts.master')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of Writings
                    @can('manage_site')
                        <a href="{{url('contents/create')}}" role="button" class="btn btn-sm btn-outline-info">Create</a>
                    @endcan
                </h2>
                <div style="height: 75vh; overflow: auto">
                    @if($contents->count())
                        <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Page</th>
                            <th scope="col">Title</th>
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($contents as $content)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>

                                <th scope="row">{{$content->id}}</th>
                                <td><a href="#">{{$content->page}}</a></td>
                                <td><a href="#">{{$content->title}}</a></td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('contents/'.$content->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @endif
                </div>
            </div>

            @include('layouts.partials.sidemenu')
        </div>
    </div>

    <br>
    <br>
    <br>
@endsection
