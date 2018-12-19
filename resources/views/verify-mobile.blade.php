@extends('layouts.master')

@section('content')
    {{--<div class="container">
        <nav class="navbar navbar-light bg-info fixed-bottom">
            <form class="form-inline pl-sm-5">
                <div class="input-group center">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">4 digits</span>
                    </div>
                    <input type="text" class="form-control mr-2" placeholder="Enter Mobile OTP" aria-label="Username" aria-describedby="basic-addon1">
                    <button class="btn btn-dark" type="submit">Verify</button>
                </div>
            </form>
        </nav>
    </div>--}}

    <div class="container">
        <br>
        <br>
        @include('layouts.alerts.flash')
        @include('layouts.alerts.errors')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img src="https://cdn2.iconfinder.com/data/icons/luchesa-part-3/128/SMS-512.png" class="img-responsive img-rounded" width="150px" height="150px" style="align-self: center">
                <br><br>
                <h2>Verify your mobile number</h2>
                <p></p>
                <p><b>An OTP has been sent to your mobile number. Please enter below the 4 digit OTP to verify your mobile number</b></p>
                <p></p>
                <br>
                    <form class="form-inline" action="{{ route('verifyEmail') }}" method="post">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">4 digits</span>
                            </div>
                            <input type="text" class="form-control mr-2" placeholder="Enter Mobile OTP" id="otp" name="otp" required autofocus>
                            <button class="btn btn-dark" type="submit">Verify</button>
                        </div>
                    </form>
                <br><br>
            </div>
        </div>


    </div>
@endsection
