@extends('layouts.master')

@section('extra-css')
    <style>
        .form-gap {
            padding-top: 70px;
        }

        .bottom-gap {
            padding-bottom: 100px;
        }
        .card{
            border: 2px solid rgba(0,0,0,.125);
        }

    </style>

@endsection

@section('content')
    <div class="form-gap"></div>
    <div class="container bottom-gap">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <span class="anchor" id="formChangePassword"></span>
                <!-- form card change password -->
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Reset Password</h3>
                    </div>
                    <div class="card-body">
                        <form class="form" role="form" method="POST" action="{{ route('password.request') }}" autocomplete="off">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="form-text small text-muted">
                                    The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                </span>
                                @if ($errors->has('password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <span class="form-text small text-muted">
                                    To confirm, type the new password again.
                                </span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /form card change password -->

            </div>
        </div>
    </div>
@endsection
