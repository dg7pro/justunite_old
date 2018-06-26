@extends('layouts.master')

@section('content')

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-9">
                <h2>User Setting</h2>

                <form method="POST" action="{{url('hide-profile/'. Auth::id())}}">
                   {{-- {{ method_field('PATCH') }}--}}
                    {{ csrf_field() }}


                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Hide your Profile:</h4>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="invisible" name="invisible" {{ Auth::user()->invisible==1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleCheck1">
                                Check this box to hide your profile
                            </label>
                        </div>
                        <br>
                        <p>By hiding your profile from public view. No one will be able to guess if
                            you are member or not! But you will be able to see other member's profile, who have not hidden
                            their profile.
                        </p>

                        <hr>

                        <p class="mb-0">
                            <button type="submit" class="btn btn-outline-info">Update</button>
                        </p>

                    </div>

                </form>
                <br>

            </div>
            <div class="col-md-3">
                @include('layouts.partials.dashboard-menu')
            </div>
        </div>
    </div>
    <br><br>
@endsection

@section('extra-js')


@endsection
