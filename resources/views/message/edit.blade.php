@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br>
                <br>
                <h2>Edit Content
                    @can('manage_site')
                        <a href="{{url('messages')}}" role="button" class="btn btn-sm btn-outline-info">Messages</a>
                    @endcan
                </h2>

                <form method="POST" action="{{url('messages/'.$message->id)}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" name="subject" class="form-control" value="{{$message->subject}}">
                    </div>

                   {{-- <div class="form-group">
                        <label for="message">Message:</label>
                        <input type="text" name="message" class="form-control" value="{{$message->message}}">
                    </div>--}}

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea name="message" id="msg-content" class="form-control" style="height: 50vh;">{{$message->message}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="url">Url:</label>
                        <input type="text" name="url" class="form-control" placeholder="Enter title" value="{{$message->url}}">
                    </div>

                    <br>
                    <button type="submit" class="btn btn-outline-info">Update Message</button>
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
        //CKEDITOR.replace( 'msg-content');
    </script>
@endsection