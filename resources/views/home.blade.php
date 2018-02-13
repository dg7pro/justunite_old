@extends('layouts.master')

@section('content')
    <div class="container">
        {{--<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>--}}

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-4">
                                @if(file_exists(public_path().'/upload/'.Auth::User()->uuid.'.png'))
                                    <img src="{{'upload/'.Auth::User()->uuid.'.png'}}" alt="Profile Pic" class="img-thumbnail" width="150" height="150">
                                @else
                                    <img data-name="{{ Auth::User()->name }}" class="demo img-thumbnail" width="150" height="150"/>
                                    {{--<img src="images/profile-pic.png" alt="Profile Pic" class="img-thumbnail" width="150" height="150">--}}
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h3>Welcome: {{Auth::User()->name}}</h3>
                                <h5>Last Login: {{ Auth::user()->updated_at->diffForHumans() }}</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Email: {{Auth::User()->email}}</h5>
                                        <h5>Mobile: 7565097233</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Constituency: Varanasi</h5>
                                        <h5>Association: Women Wing</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile Info:</div>

                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <br>
                                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                        <div class="col-md-10 col-md-offset-2">
                                            <label for="gender" class="control-label">Select State first:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-map" aria-hidden="true"></i>
                                                </div>

                                                <select name="gender" required="required" class="form-control input-lg" autofocus>
                                                    <option disabled selected>State</option>
                                                    <option value="m" @if (old('gender') == 'm') selected="selected" @endif>UP</option>
                                                    <option value="f" @if (old('gender') == 'f') selected="selected" @endif>Bihar</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <div class="form-group{{ $errors->has('m_status') ? ' has-error' : '' }}">
                                        <div class="col-md-10 col-md-offset-0">
                                            <label for="m_status" class="control-label">Select Constituency</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </div>
                                                <select name="m_status" required="required" class="form-control input-lg" autofocus>
                                                    <option disabled selected>Constituency</option>
                                                    <option value="m" @if (old('m_status') == 'm') selected="selected" @endif>Kausambhi</option>
                                                    <option value="f" @if (old('m_status') == 'um') selected="selected" @endif>Varanasi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="col-md-3 col-md-offset-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Save Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile Info:</div>

                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}



                            <div class="row">
                                <div class="col-md-6">
                                    <br>
                                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                        {{--<label for="gender" class="col-md-4 control-label">Gender</label>--}}
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                                </div>

                                                <select name="gender" required="required" class="form-control account" autofocus>
                                                    <option disabled selected>Gender</option>
                                                    <option value="m" @if (old('gender') == 'm') selected="selected" @endif>Male</option>
                                                    <option value="f" @if (old('gender') == 'f') selected="selected" @endif>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('m_status') ? ' has-error' : '' }}">
                                        {{--<label for="m_status" class="col-md-4 control-label">Martial Status</label>--}}
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </div>

                                                <select name="m_status" required="required" class="form-control account" autofocus>
                                                    <option disabled selected>Martial Status</option>
                                                    <option value="m" @if (old('m_status') == 'm') selected="selected" @endif>Married</option>
                                                    <option value="f" @if (old('m_status') == 'um') selected="selected" @endif>Unmarried</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('age-group') ? ' has-error' : '' }}">
                                        {{--<label for="age-group" class="col-md-4 control-label">Martial Status</label>--}}
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                </div>

                                                <select name="age-group" required="required" class="form-control account" autofocus>
                                                    <option disabled selected>Your Age Group</option>
                                                    <option value="m" @if (old('age-group') == 'm') selected="selected" @endif>18 to 25years</option>
                                                    <option value="f" @if (old('age-group') == 'um') selected="selected" @endif>25 to 35years</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <br>
                                    <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-flag" aria-hidden="true"></i>
                                                </div>

                                                <select name="religion" required="required" class="form-control account" autofocus>
                                                    <option disabled selected>Religion</option>
                                                    <option value="m">Hindu</option>
                                                    <option value="f">Muslim</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                </div>

                                                <select name="education" required="required" class="form-control account" autofocus>
                                                    <option disabled selected>Education</option>
                                                    <option value="1">High School</option>
                                                    <option value="2">Intermediate</option>
                                                    <option value="3">Under Graduate</option>
                                                    <option value="4">Graduation</option>
                                                    <option value="5">Masters</option>
                                                    <option value="6">Doctorate</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-building" aria-hidden="true"></i>
                                                </div>

                                                <select name="Profession" required="required" class="form-control account" autofocus>
                                                    <option disabled selected>Profession</option>
                                                    <option value="m">Government Service</option>
                                                    <option value="f">Private Job</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    {{--<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                        --}}{{--<label for="gender" class="col-md-4 control-label">Gender</label>--}}{{--
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-map" aria-hidden="true"></i>
                                                </div>

                                                <select name="gender" required="required" class="form-control account" autofocus>
                                                    <option disabled selected>State</option>
                                                    <option value="m" @if (old('gender') == 'm') selected="selected" @endif>UP</option>
                                                    <option value="f" @if (old('gender') == 'f') selected="selected" @endif>Bihar</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('m_status') ? ' has-error' : '' }}">
                                        --}}{{--<label for="m_status" class="col-md-4 control-label">Martial Status</label>--}}{{--
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </div>

                                                <select name="m_status" required="required" class="form-control account" autofocus>
                                                    <option disabled selected>Constituency</option>
                                                    <option value="m" @if (old('m_status') == 'm') selected="selected" @endif>Kausambhi</option>
                                                    <option value="f" @if (old('m_status') == 'um') selected="selected" @endif>Varanasi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('age-group') ? ' has-error' : '' }}">
                                        --}}{{--<label for="age-group" class="col-md-4 control-label">Martial Status</label>--}}{{--
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    --}}{{--<i class="fa fa-user" aria-hidden="true"></i>--}}{{--
                                                    <span class="glyphicons glyphicons-family"></span>
                                                </div>

                                                <select name="age-group" required="required" class="form-control account" autofocus>
                                                    <option disabled selected>Member Type</option>
                                                    <option value="m" @if (old('age-group') == 'm') selected="selected" @endif>18 to 25years</option>
                                                    <option value="f" @if (old('age-group') == 'um') selected="selected" @endif>25 to 35years</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="col-md-3 col-md-offset-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Save Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Level of Involvement</div>

                    <div class="panel-body">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="sel1">I want to join as:</label>
                                <select class="form-control input-lg" id="sel1">
                                    <option disabled selected>Select</option>
                                    <option>Commoner (Simple Member)</option>
                                    <option>Volunteer</option>
                                    <option>Women Wing</option>
                                    <option>Youth Wing</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <a href="#">
                                <img src="images/wikipedia-icon.png" alt="Profile Pic" class="img-thumbnail" width="50" height="50">
                            </a>
                            <h4>Learn More..</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <br>
        <br>
        <br>
        <br>
    </div>
@endsection

@section('extra-js')

    <script src="{{asset('js/initial.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.demo').initial({
                name: 'Name', // Name of the user
                charCount: 1, // Number of characherts to be shown in the picture.
                textColor: '#ffffff', // Color of the text
                seed: 1, // randomize background color
                height: 100,
                width: 100,
                fontSize: 70,
                fontWeight: 500,
                fontFamily: 'HelveticaNeue-Light,Helvetica Neue Light,Helvetica Neue,Helvetica, Arial,Lucida Grande, sans-serif',
                radius: 50,
            });
        })
    </script>

@endsection