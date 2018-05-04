@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br>
                <br>
                <h2>Edit Content
                    @can('manage_site')
                        <a href="{{url('contents')}}" role="button" class="btn btn-sm btn-outline-info">All Contents</a>
                    @endcan
                </h2>

                <form method="POST" action="{{url('contents/'.$content->id)}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="course">Page:</label>
                        <input type="text" name="page" class="form-control" value="{{$content->page}}">
                    </div>

                    <div class="form-group">
                        <label for="course">Slug:</label>
                        <input type="text" name="slug" class="form-control" value="{{$content->slug}}">
                    </div>

                    <div class="form-group">
                        <label for="course">Title:</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{$content->title}}">
                    </div>

                    <div class="form-group">
                        <label for="course">Write:</label>
                        <textarea name="matter" id="matter" class="form-control" style="height: 50vh;">{{$content->matter}}</textarea>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-outline-info">Update Content</button>
                </form>

                <br>
                <br>
                <br>


            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        CKEDITOR.replace( 'matter');


    </script>
@endsection