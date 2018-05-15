@extends('layouts.master')

@section('content')

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>
                    User's Opinion:
                </h2>
                {{--<form method="post" action="">
                    {{ csrf_field() }}

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Opinion</th>
                        <th scope="col">Active</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($opinions as $opinion)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <div class="form-group">
                                    <label for="course">User Opinion:</label>
                                    <textarea name="matter" id="matter" class="form-control" style="height: 50vh;">{{$opinion->matter}}</textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="parties_id[]" value="{{$opinion->id}}">
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>

                </form>--}}

                @foreach($opinions as $opinion)

                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">
                        {{$opinion->user->name.'\'s'.' opinion'}}
                        @can('manage_site')
                            <a href="{{url('opinions/'.$opinion->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                        @endcan

                    </h4>
                    <p>{!! $opinion->matter  !!}</p>
                    <hr>

                    <div class="text-right">

                        <b class="pull-left" style="padding-top: 8px">{{ $opinion->created_at->diffForHumans() }}</b>
                        {{--<b>Submitted by ~ {{$opinion->user->name}}</b>--}}
                        {{--<a href="{{url('opinions/'.$opinion->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Like</a>--}}
                        {{--<b style="text-align:right">{{' |   '. $opinion->liked_by_count }} likes</b>--}}

                        <b>{{546 .' Likes '}}</b>
                        <a href="{{url('opinions/'.$opinion->id.'/edit')}}" role="button" style="padding-right: 2em">
                            <i class="fa fa-thumbs-o-up fa-2x fa-flip-horizontal" aria-hidden="true"> </i>
                        </a>
                    </div>

                </div>

                @endforeach





            </div>
            @include('layouts.partials.sidemenu')
        </div>
    </div>
    <br><br>
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
        function ConfirmVoteChange(){

            var x = confirm("You have already voted, do you want to change your vote?");
            if (x)
                return true;
            else
                return false;
        }
    </script>




@endsection
