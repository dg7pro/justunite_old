@extends('layouts.master')

@section('content')
    <div class="jumbotron color4">
        <div class="container">
            <h1 class="display-3">Groups & Wings</h1>
            <p>This page shows list of all the groups, wings and branches in which JU is divided for proper organization and functioning of members. Each group has different credits and associated powers.</p>
            <p><a class="btn btn-primary btn-lg" href="{{url('groups/'.Auth::user()->group_id)}}" role="button">Vote for Ur Group &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>List of Groups</h2>
                {{--{{$groups}}--}}
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S. No</th>
                        <th scope="col">Group Name</th>
                        <th scope="col">Credits</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <th scope="row">{{$group->id}}</th>
                            <td scope="row">{{$group->name}}</td>
                            <td scope="row">{{$group->votes}}</td>
                            {{--<td style="background-color: {{$group->hex}}">{{$group->color}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Description & Notes:</h4>
                    <p>Each group has different voting power. User can belong to 2 or more groups, their voting power adds up.
                        Like any women can be member of Women Wing as well as ETF her total voting power will be 2+3=5 </p>
                    <hr>
                    <p class="mb-0"></p>
                </div>

                <br>
                <br>
                <br>


            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>
@endsection
