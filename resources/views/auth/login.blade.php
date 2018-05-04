@extends('layouts.master')

@section('extra-css')

    <style rel="stylesheet">
        .form-signin
        {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading, .form-signin .checkbox
        {
            margin-bottom: 10px;
        }
        .form-signin .checkbox
        {
            font-weight: normal;
        }
        .form-signin .form-control
        {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin .form-control:focus
        {
            z-index: 2;
        }
        .form-signin input[type="text"]
        {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"]
        {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .account-wall
        {
            margin-top: 10px;
            padding: 40px 0px 20px 0px;
            background-color: #e9a2f7; //f7f7f7
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
       /* .login-title
        {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }*/
        .profile-img
        {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
      /*  .need-help
        {
            margin-top: 10px;
        }*/
        .new-account
        {
            display: block;
            margin-top: 10px;
        }

    </style>

@endsection

@section('content')
    <div class="container">

        <br><br>
        <div class="row" style="align-content: center">
            <div class="col-sm-6 col-md-4 offset-md-4">
                <h3 class="text-center login-title">Login to continue</h3>
                <div class="account-wall">
                    {{--<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                         alt="">--}}
                    <img class="profile-img" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"
                         alt="">


                    <form class="form-signin" method="POST"  action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email"  type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <br>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <br>
                        </div>


                        <div>
                            <label class="checkbox pull-left">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                Remember Me
                            </label>
                            <a href="#" class="pull-right need-help">Need help?</a>
                        </div>

                        <button class="btn btn-lg btn-danger btn-block" type="submit">
                            Sign in</button>
                    </form>
                  {{--  <a href="#" class="text-center new-account">Forget Password? </a>--}}
                </div>

                <a href="{{route('register')}}" class="text-center new-account"><b class="text-primary">Create an account</b></a>
                <br><br>
            </div>
        </div>
        <br>
    </div>



@endsection
