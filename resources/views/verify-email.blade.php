@extends('layouts.master')

@section('extra-css')

@endsection

@section('content')
    <div class="container">
        <br>
        <br>
        @include('layouts.alerts.flash')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img src="https://cdn3.iconfinder.com/data/icons/finance-152/64/16-512.png" class="img-responsive img-rounded" width="150px" height="150px" style="align-self: center">
                <br><br>
                <h2>Verify your email</h2>
                <p></p>
                <p><b>An OTP has been sent to your registered email. Please enter below the 4 digit OTP to verify your email</b></p>
                <p></p>
                <br>
                <form class="form-inline" action="{{ route('verifyEmail') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">4 digits</span>
                        </div>
                        <input type="text" class="form-control mr-2" placeholder="Enter Email OTP" id="otp" name="otp" required autofocus>
                        <button class="btn btn-dark" type="submit">Verify</button>
                    </div>
                </form>
                <br><br>
            </div>
        </div>


    </div>
@endsection

@section('extra-js')


@endsection