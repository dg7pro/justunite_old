@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br>
                <br>
                <h2>Create New Writing</h2>

                <form method="POST" action="{{url('contents')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="course">Page:</label>
                        <input type="text" name="page" class="form-control" placeholder="Enter page">
                    </div>

                    <div class="form-group">
                        <label for="course">Slug:</label>
                        <input type="text" name="slug" class="form-control" placeholder="Enter slug">
                    </div>


                    <div class="form-group">
                        <label for="course">Title:</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter title">
                    </div>

                    <div class="form-group">
                        <label for="course">Write:</label>
                        <textarea name="matter" id="matter" class="form-control" style="height: 50vh;">Put your content here...</textarea>
                    </div>

                    <button type="submit" class="btn btn-outline-info">Add Course</button>
                </form>



                <br>
                <br>
                <br>
                <br>
                <br>
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
        CKEDITOR.replace( 'matter');


    </script>
@endsection