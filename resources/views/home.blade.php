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
                    <div class="col-md-4 text-center">
                        @if(file_exists(public_path().'/upload/'.Auth::User()->uuid.'.png'))
                            <img src="{{'upload/'.Auth::User()->uuid.'.png'}}" alt="Profile Pic" class="img-thumbnail" width="200" height="200">
                            <br>
                        @else
                            <img data-name="{{ Auth::User()->name }}" class="demo img-thumbnail" width="200" height="200"/>
                            <br>
                            {{--<img src="images/profile-pic.png" alt="Profile Pic" class="img-thumbnail" width="150" height="150">--}}
                        @endif
                        <br>
                        <a href="{{url('image-crop')}}" role="button" class="btn btn-outline-primary">Change Image</a>
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
                                <td class="text-primary">
                                    {{Auth::User()->email}}
                                    {{--<button type="submit" class="btn btn-outline-info btn-sm">Verify</button>--}}
                                </td>
                            </tr>
                            <tr>
                                <td>Mobile:</td>
                                <td>
                                    @if(Auth::User()->mobile)
                                        {{Auth::User()->mobile}}
                                        {{--<button type="submit" class="btn btn-outline-info btn-sm">Verify</button>--}}
                                    @else
                                        <i><a href="#constituency" class="text-primary js-scroll-trigger">Enter...</a></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Constituency:</td>
                                <td>
                                    @if($constituency)
                                        {{ $constituency->pc_name .' ('. $constituency->state->name2 .')' }}
                                    @else
                                        <i><a href="#constituency" class="text-primary js-scroll-trigger">Enter...</a></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Group:</td>
                                <td>
                                    @if(Auth::User()->group)
                                        {{Auth::User()->group->name}}
                                    @else
                                        <i><a href="#constituency" class="text-primary js-scroll-trigger">Enter...</a></i>
                                    @endif
                                </td>
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
                            <h4 class="text-primary"  id="constituency" >Account Info:</h4>

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

                                <div class="form-group col-md-6" id="mobile">
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

    <script>

        // Select all links with hashes
        $('a[href*="#"]')
        // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });

    </script>

    <!-- LOAD JQUERY-JEDITABLE -->
   {{-- <script src="{{asset('js/jquery.jeditable.js')}}"></script>

    <script>
        /* data that will be sent along */
        var submitdata = {}
        /* this will make the save.php script take a long time so you can see the spinner ;) */
        submitdata['slow'] = true;
        submitdata['pwet'] = 'youpla';

        $(".editable-text-full").editable("{{url('users/'.Auth::User()->id)}}", {
            indicator : "<img src='{{asset('images/spinner.svg')}}' />",
            type : "text",
            // only limit to three letters example
            //pattern: "[A-Za-z]{3}",
            onedit : function() { console.log('If I return false edition will be canceled'); return true;},
            before : function() { console.log('Triggered before form appears')},
            callback : function(result, settings, submitdata) {
                console.log('Triggered after submit');
                console.log('Result: ' + result);
                console.log('Settings.width: ' + settings.width);
                console.log('Submitdata: ' + submitdata.pwet);
            },
            //cancel : 'Cnl',
            cssclass : 'custom-class',
            cancelcssclass : 'btn btn-danger btn-sm',
            submitcssclass : 'btn btn-outline-success btn-sm',
            maxlength : 200,
            // select all text
            select : true,
            //label : 'This is a label',
            onreset : function() { console.log('Triggered before reset') },
            onsubmit : function() { console.log('Triggered before submit') },
            showfn : function(elem) { elem.fadeIn('slow') },
            submit : 'Save',
            submitdata : submitdata,
            /* submitdata as a function example
            submitdata : function(revert, settings, submitdata) {
                console.log("Revert text: " + revert);
                console.log(settings);
                console.log("User submitted text: " + submitdata.value);
            },
            */
            tooltip : "Click to edit...",
            width : 160
        });
    </script>--}}



@endsection