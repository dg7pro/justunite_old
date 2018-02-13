@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <br><br>
                <h2>Edit Constituency</h2>

                <form method="post" action="{{url('constituencies/'.$constituency->id)}}">

                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="answer">Name:</label>
                        <input type="text" name="pc_name" class="form-control" placeholder="Put your Option" value="{{$constituency->pc_name}}">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>

                </form>

                <p>Display form to edit constituency model</p>
                {{$constituency}}

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