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
                <span class="anchor" id="formResetPassword">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </span>
                <!-- form card reset password -->
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Reset Password</h3>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST"  action="{{ route('password.email') }}" role="form" autocomplete="off">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <label for="email" class="control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                <span id="helpResetPasswordEmail" class="form-text small text-muted">
                                    Password reset link will be sent on this email address.
                                </span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /form card reset password -->

            </div>
        </div>
    </div>
@endsection
