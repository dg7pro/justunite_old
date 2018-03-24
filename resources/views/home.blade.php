@extends('layouts.master')

@section('extra-css')
    <style>
        .table-borderless td,
        .table-borderless th {
            border: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <br>
        <br>
        @include('layouts.alerts.success')
        @include('layouts.alerts.error')
        <div class="row">
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-4">
                        @if(file_exists(public_path().'/upload/'.Auth::User()->uuid.'.png'))
                            <img src="{{'upload/'.Auth::User()->uuid.'.png'}}" alt="Profile Pic" class="img-thumbnail" width="200" height="200">
                            <br>
                        @else
                            <img data-name="{{ Auth::User()->name }}" class="demo img-thumbnail" width="200" height="200"/>
                            <br>
                            {{--<img src="images/profile-pic.png" alt="Profile Pic" class="img-thumbnail" width="150" height="150">--}}
                        @endif
                        <br>
                        <a href="{{url('image-crop')}}" role="button" class="btn btn-outline-primary">Upload a different pic</a>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2"><h3>Welcome: {{ Auth::User()->name }} </h3></th>


                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Email:</td>
                                <td>{{Auth::User()->email}}</td>
                            </tr>
                            <tr>

                                <td>Mobile:</td>
                                <td>{{Auth::User()->mobile}}</td>
                            </tr>
                            <tr>

                                <td>Constituency:</td>
                                <td>
                                    @if($constituency)
                                        {{$constituency->pc_name}}
                                    @else
                                        <i>{{'Unknown ...'}}</i>
                                    @endif
                                </td>
                            </tr>
                            <tr>

                                <td>Last Login:</td>
                                <td>{{ Auth::user()->last_login->diffForHumans() }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{url('users/'.Auth::User()->id)}}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <br>
                            <h4 class="text-primary" >Loksabha Seat:</h4>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="state">State:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-map" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">Select State...</option>
                                            @foreach($states as $state)
                                                @if(Auth::User()->state_id == $state->id)
                                                    <option value="{{$state->id}}" selected>{{$state->name2}}</option>
                                                @else
                                                    <option value="{{$state->id}}">{{$state->name2}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="constituency">Constituency:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select id="constituency" name="constituency" class="form-control">
                                            @if($constituency)
                                                <option value="{{$constituency->id}}">{{$constituency->pc_name}}</option>
                                            @else
                                                <option value="">Select State first...</option>
                                            @endif
                                            {{--@foreach($constituencies as $constituency)
                                                @if(Auth::User()->constituency_id == $constituency->id)
                                                    <option value="{{$constituency->id}}" selected>{{$constituency->name}}</option>
                                                @else
                                                    <option value="{{$constituency->id}}">{{$constituency->name}}</option>
                                                @endif
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            <h4 class="text-primary">Profile Info:</h4>

                            {{-- Gender--}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="state">Gender:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select name="gender" id="gender" class="form-control">
                                            <option selected value="">Select Gender...</option>
                                            @foreach($genders as $gender)
                                                <option value="{{$gender->id}}" {{ Auth::user()->gender_id == $gender->id ? 'selected="selected"' : '' }}>{{$gender->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{--Religion--}}
                                <div class="form-group col-md-6">
                                    <label for="constituency">Religion:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-flag" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select name="religion" id="religion" class="form-control">
                                            <option selected value="">Select Religion...</option>
                                            @foreach($religions as $religion)
                                                <option value="{{$religion->id}}" {{ Auth::user()->religion_id == $religion->id ? 'selected="selected"' : '' }}>{{$religion->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mstatus">Marital Status:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select name="marital" id="marital" class="form-control">
                                            <option selected value="">Marital Status...</option>
                                            @foreach($maritals as $marital)
                                                <option value="{{$marital->id}}" {{ Auth::user()->marital_id == $marital->id ? 'selected="selected"' : '' }}>{{$marital->status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="education">Education:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select name="education" id="education" class="form-control">
                                            <option selected value="">Education</option>
                                            @foreach($educations as $education)
                                                <option value="{{$education->id}}" {{ Auth::user()->education_id == $education->id ? 'selected="selected"' : '' }}>{{$education->level}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ages">Age:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select name="age" id="age" class="form-control">
                                            <option selected value="">Your Age Group</option>
                                            @foreach($ages as $age)
                                                <option value="{{$age->id}}" {{ Auth::user()->age_id == $age->id ? 'selected="selected"' : '' }}>{{$age->group}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="profession">Profession:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-building" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select name="profession" id="profession" class="form-control">
                                            <option selected value="">Profession</option>
                                            @foreach($professions as $profession)
                                                <option value="{{$profession->id}}" {{ Auth::user()->profession_id == $profession->id ? 'selected="selected"' : '' }}>{{$profession->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            {{--<h4 class="text-primary">Your Group:</h4>

                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="group">Join as:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select name="group" id="group" class="form-control">
                                            <option selected>Select</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}" {{ Auth::user()->group_id == $group->id ? 'selected="selected"' : '' }}>{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <br>
                                    <a href="#">
                                        <img src="images/wikipedia-icon.png" alt="Profile Pic" class="img-thumbnail" width="45" height="45"><b> Learn More...</b>
                                    </a>

                                </div>
                            </div>--}}

                            <h4 class="text-primary">Other Info:</h4>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="group">Join as:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <select name="group" id="group" class="form-control">
                                            <option selected value="">Select</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}" {{ Auth::user()->group_id == $group->id ? 'selected="selected"' : '' }}>{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="group">Mobile No:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </span>
                                        </div>
                                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{Auth::user()->mobile}}">
                                    </div>
                                </div>
                            </div>



                            <br>
                            <br>
                            <div align="center">
                                <button type="submit" class="btn btn-outline-success">Update Profile</button>
                            </div>


                        </form>
                    </div>
                </div>

                <br>
                <br>
                <br>

            </div>
        </div>


    </div>
@endsection

@section('extra-js')
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="state"]').on('change', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: 'states/ajax/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {

                            //console.log(data);
                            $('select[name="constituency"]').html('<option value="">Select Constituency</option>');
                            $.each(data, function(key, value) {
                                $('select[name="constituency"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="constituency"]').empty();
                }
            });
        });
    </script>

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