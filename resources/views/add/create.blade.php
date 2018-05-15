@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br>
                @include('layouts.alerts.error')
                <br>
                <h2>Advertise Yourself</h2>

                <form method="POST" action="{{url('adds')}}">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="course">Opinion/Views: maxlength=50</label>
                        <textarea name="matter" maxlength="50" id="matter" class="form-control" style="height: 50vh;" placeholder="Put your add here..."></textarea>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="active" name="active" value=1>
                        <label class="form-check-label" for="exampleCheck1">Make active</label>
                    </div>
                    <br>

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
    <script src="{{asset('js/jquery.maxlength.min.js')}}"></script>
    <script>
        $("#matter").maxlength();
        //CKEDITOR.replace( 'matter');


    </script>
@endsection