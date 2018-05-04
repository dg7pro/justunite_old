@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br>
                <br>
                <h2>Write your Opinion</h2>

                <form method="POST" action="{{url('opinions')}}">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="course">Opinion/Views:</label>
                        <textarea name="matter" id="matter" class="form-control" style="height: 50vh;">Put your content here...</textarea>
                    </div>

                    <button type="submit" class="btn btn-outline-info">Submit</button>
                </form>

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