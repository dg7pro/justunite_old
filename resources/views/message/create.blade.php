@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Place the message to Notify</div>

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif
                        @if (Session::has('message'))
                            <div class="alert alert-primary">{{ Session::get('message') }}
                                <a href="#" class="close" data-dismiss="alert">&times;</a></div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            {{--<form method="post" action="{{url('message-users')}}">--}}
                            <form method="post" action="{{url('messages')}}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="subject">Message Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" name="message" id="message" rows="7" placeholder="Message from Admin"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="basic-url">Read more URL</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon3">https://example.com/users/</span>
                                        <input type="text" class="form-control" name="url" id="url" aria-describedby="basic-addon3">
                                    </div>
                                </div>

                                {{--<div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>--}}
                                {{--<div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>--}}
                                {{--<div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div>--}}
                                <button type="submit" class="btn btn-info">Create Msg/Notification</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script type="text/javascript">

        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
        });
        }, 4000);

    </script>

@endsection
