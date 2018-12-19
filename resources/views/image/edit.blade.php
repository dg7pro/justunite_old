@extends('layouts.master')

@section('content')
    <div class="container">

        @include('layouts.alerts.flash')
        @include('layouts.alerts.errors')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br>
                <h2>Edit Image</h2>
                <form method="post" action="{{url('images/'.$image->id)}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="name" class="form-control" placeholder="Name..." value="{{$image->name}}">
                    </div>

                    @if($image->association)
                        <div class="form-group">
                            <label for="heading">Heading:</label>
                            <select name="profession" id="profession" class="form-control">
                                <option selected value="">Profession</option>
                                @foreach($professions as $profession)
                                    <option value="{{$profession->id}}" {{ $image->association == $profession->id ? 'selected="selected"' : '' }}>{{$profession->category}}</option>
                                @endforeach
                            </select>
                        </div>



                    @endif

                    <div class="form-group">
                        <label for="heading">Heading:</label>
                        <input type="text" name="heading" class="form-control" placeholder="Heading..." value="{{$image->heading}}">
                    </div>

                    <div class="form-group">
                        <label for="image">Caption:</label>
                        <input type="text" name="caption" class="form-control" placeholder="Caption..." value="{{$image->caption}}">
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