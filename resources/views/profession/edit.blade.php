@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br>
                <h2>
                    Edit Profession
                    @can('manage_site')
                        <a href="{{url('professions/'.$profession->id)}}" role="button" class="btn btn-sm btn-outline-info">View</a>
                        {{--<form method="POST" action="{{url('professions/'.$profession->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>--}}
                    @endcan
                </h2>
                <form method="post" action="{{url('professions/'.$profession->id)}}">

                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" name="category" class="form-control" placeholder="Put Category" value="{{$profession->category}}">
                    </div>

                    <div class="form-group">
                        <label for="details">Details:</label>
                        <textarea name="details" id="notes-content" class="form-control" placeholder="Put Details" rows="10" >{{$profession->details}}</textarea>
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