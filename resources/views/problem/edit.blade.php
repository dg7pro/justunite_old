@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br>
                <h2>
                    Edit Problem
                    @can('manage_site')
                        <a href="{{url('problems/'.$problem->id)}}" role="button" class="btn btn-sm btn-outline-info">View</a>
                        <form method="POST" action="{{url('problems/'.$problem->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    @endcan
                </h2>
                <form method="post" action="{{url('problems/'.$problem->id)}}">

                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" placeholder="Put Title" value="{{$problem->title}}">
                    </div>

                    <div class="form-group">
                        <label for="notes">Notes:</label>
                        <textarea name="notes" id="notes-content" class="form-control" placeholder="Put Notes" rows="10" >{{$problem->notes}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>

                </form>
                <br>

                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Description & Notes:</h4>
                    <p>Each group has different voting power. User can belong to 2 or more groups, their voting power adds up.
                        Like any women can be member of Women Wing as well as ETF her total voting power will be 2+3=5 </p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>

                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        CKEDITOR.replace( 'notes-content');

        function ConfirmDelete(){

            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;

        }
    </script>
@endsection