@if(!Auth::guest())
    @if(Cache::has('OTP_for_'.Auth::User()->id))
    @if(Auth::User()->em_verified)
        <div class="container">
            <nav class="navbar navbar-light bg-info fixed-bottom">
                <form class="form-inline pl-sm-5" action="{{ route('verifyMobile') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">4 digits</span>
                        </div>
                        <input type="text" class="form-control mr-2" placeholder="Enter Mobile OTP" id="otp" name="otp" required autofocus aria-label="Username" aria-describedby="basic-addon1">
                        <button class="btn btn-dark" type="submit">Verify</button>
                    </div>
                </form>
            </nav>
        </div>
    @else
        <div class="container">
            <nav class="navbar navbar-light bg-info fixed-bottom">
                <form class="form-inline pl-sm-5" action="{{ route('verifyEmail') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">4 digits</span>
                        </div>
                        <input type="text" class="form-control mr-2" placeholder="Enter Email OTP" id="otp" name="otp" required autofocus aria-label="Username" aria-describedby="basic-addon1">
                        <button class="btn btn-dark" type="submit">Verify</button>
                    </div>
                </form>
            </nav>
        </div>
    @endif
@endif
@endif