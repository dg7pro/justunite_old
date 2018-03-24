@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br>
                <h2>
                    Create Problem
                    @can('manage_site')
                        <a href="{{url('problems')}}" role="button" class="btn btn-sm btn-outline-info">View All</a>
                    @endcan
                </h2>


                <form method="post" action="{{url('problems')}}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" placeholder="Put Title" value="{{Request::old('title')}}" >
                    </div>

                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="text" name="image" class="form-control" placeholder="Put Image" value="{{Request::old('image')}}">
                    </div>

                    <div class="form-group">
                        <label for="notes">Notes:</label>
                        <textarea name="notes" id="notes-content" class="form-control" placeholder="Put Notes" rows="10" >{{Request::old('notes')}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Create</button>

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
    </script>


@endsection