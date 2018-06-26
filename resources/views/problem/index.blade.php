@extends('layouts.master')

@section('content')

    <div class="jumbotron color2">
        <div class="container">
            <h1 class="display-3">Problems (समस्याएं)</h1>
            <p><b>70 years, 543 parliament members, 1048 legislative assembly members and more than 1000 Political Parties,
                but still unable to solve 27 problems. Hope this time we chose Prime minister who can solve all these problems</b></p>
            <p><a href="{{url('problems/voting')}}" role="button" class="btn btn-outline-dark" >Most Serious Problem &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of Problems
                    <a href="{{url('problems/voting')}}" role="button" class="btn btn-outline-info" >Most Serious Problem &raquo;</a>
                    <a href="{{$whatsapp}}" role="button" class="btn btn-outline-success" ><i class="fa fa-whatsapp"> Join Whatsapp</i> </a>

                </h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Problems</th>
                        <th scope="col">Votes</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                            <th scope="col">Del</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($problems as $problem)
                        <tr>
                            <th scope="row">{{$problem->id}}</th>
                            <td>
                                <a href="{{url('problems/'.$problem->id)}}"><b>{{$problem->title}}</b></a>

                            </td>
                            <td>{{500}}</td>
                            @can('manage_site')
                                <td>
                                    <a href="{{url('problems/'.$problem->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                </td>
                                <td>
                                <form method="POST" action="{{url('problems/'.$problem->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Del</button>
                                </form>
                                </td>
                            @endcan

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <br>
                <p><a href="{{url('problems/voting')}}" role="button" class="btn btn-outline-dark" >Most Serious Problem &raquo;</a></p>
                <br>

            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
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
