@extends('layouts.master')

@section('content')
    <div class="container">
        <br>
        <div class="row">

            <div class="col-md-9">
                <h2>{{$user->name}}
                    @can('manage_site')
                        <a href="{{url('users/'.$user->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit.c</a>
                    @endcan
                </h2>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    @if(count($images))
                        <ol class="carousel-indicators">
                            @foreach($images as $image)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->iteration == 1 ? 'active' : ''}}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($images as $image)
                                <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : ''}}">
                                    <img class="d-block w-100" src="{{asset('storage/'.$image->name)}}" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{$image->heading}}</h5>
                                        <p>{{$image->caption}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    @else
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('storage/default.svg')}}" alt="First slide">
                            </div>
                           {{-- <div class="carousel-item">
                                <img class="d-block w-100" src="..." alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="..." alt="Third slide">
                            </div>--}}
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    @endif
                </div>
                <br>
                {{--<h4 class="text-center text-primary">Everyone of us can become a leader!</h4>
                <hr>--}}
                <div>
                    <h4 class="text-primary">{{$hiMsg->title or ''}}</h4>
                    <div>
                        {!! $hiMsg->matter or '' !!}
                        {{--<b>
                            Spread the awareness - that whichever political party we may be supporter off, we will not going
                            to vote for them in 2019 general election unless our favorite party give a satisfactory and
                            clear cut solution of all the  27 problems which India is facing for decades. Ask your favorite
                            political party as to how they are going to solve all these problems if they win in 2019 Election.
                            Together we can put pressure on them.
                        </b>--}}
                    </div>
                    <br>
                    <a data-toggle="collapse" href="#hiMsg" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-recycle fa-2x text-warning" aria-hidden="true"> </i>{{" . "}}
                    </a>

                    <a data-toggle="collapse" href="#userComment" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-comments fa-2x text-danger" aria-hidden="true"></i>{{" . "}}
                    </a>

                    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-map-signs fa-2x text-success" aria-hidden="true"></i>
                    </a>
                    <br>
                    <div class="collapse" id="hiMsg">
                        <div>
                            <br>
                            <h4 class="text-primary">{{$engMsg->title or ''}}</h4>
                            {!! $engMsg->matter or '' !!}

                        </div>
                    </div>
                    <div class="collapse" id="userComment">
                        <div>
                            <br>
                            <h4 class="text-primary">{{$user->name.' writes'}}</h4>
                            @if(Auth::guest())
                                <b>{{ (!empty($user->opinion->matter) and $user->opinion->active == 1) ? $user->opinion->matter : 'No Comments from this User' }} </b>
                            @else
                                @if($user->id == Auth::user()->id )
                                    @if(empty($user->opinion->matter))
                                        <b>Hi {{$user->name }} ! <br> Here you can write & share your social, political, religious, legal, and administrative views etc. Your views will be visible to all.</b>
                                        <a href="{{url('opinions/create')}}" role="button" class="btn btn-sm btn-info">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            Write
                                        </a>
                                    @else
                                        <b>{{$user->opinion->active == 1 ? $user->opinion->matter : 'Make comment active to publish'  }} </b>
                                        <a href="{{url('opinions/'.$user->opinion->id.'/edit')}}" role="button" class="btn btn-sm btn-info">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            Edit
                                        </a>
                                    @endif
                                @else
                                    <b>{{ (!empty($user->opinion->matter) and $user->opinion->active == 1) ? $user->opinion->matter : 'No Comments from this User'  }}</b>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample">
                        <div>
                            <b>1 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson
                                ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                sapiente ea proident.
                            </b>
                        </div>
                    </div>
                    {{--<p>
                        छपाई और अक्षर योजन उद्योग का एक साधारण डमी पाठ है. सन १५०० के बाद से अभी तक इस उद्योग का मानक डमी पाठ
                        मन गया, जब एक अज्ञात मुद्रक ने नमूना लेकर एक नमूना किताब बनाई. यह न केवल पाँच सदियों से जीवित रहा बल्कि इसने
                        इलेक्ट्रॉनिक मीडिया में छलांग लगाने के बाद भी मूलतः अपरिवर्तित रहा. यह के दशक में अंश युक्त पत्र के रिलीज के
                        साथ लोकप्रिय हुआ, और हाल ही में Aldus PageMaker के संस्करणों सहित तरह डेस्कटॉप प्रकाशन सॉफ्टवेयर के साथ
                        अधिक प्रचलित हुआ.
                    </p>--}}
                </div>
                {{--<div class="card bg-light mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>--}}
                {{--<br>
                <div>
                    <h4 class="text-primary">Personal Info:</h4>
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr><th>Name: </th><th>{{$user->name}}</th></tr>
                        <tr><th>Profession: </th><th>{!! $user->profession->category or '<i>Unknown..</i>'!!}</th></tr>
                        <tr><th>Location: </th><th>{!! $user->constituency->pc_name or '<i>Unknown..</i>'!!}</th></tr>
                        <tr>
                            <td colspan="2"><b class="text-primary">Contact me for:</b>
                                <br><br>
                                <div>
                                    <b><i>I am a web developer. You can contact me for any type of web design and development.<b><i>
                                </div>

                            </td>
                        </tr>
                        <tr><th>Mobile: </th><th>{!! $user->mobile or '<i>Unknown..</i>' !!}</th></tr>
                        <tr><th>Email: </th><th>{!! $user->email or '<i>Unknown..</i>' !!}</th></tr>

                        </tbody>
                    </table>
                </div>
                <br>--}}
                <br>
                <div>
                    <h4 class="text-primary">Personal Info:</h4>
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr><th>Name: </th><th>{{$user->name}}</th></tr>
                        <tr><th>Gender: </th><th>{!! $user->gender->name or '<i>Unknown..</i>' !!}</th></tr>
                        <tr><th>Marital Status: </th><th>{!! $user->marital->status or '<i>Unknown..</i>'  !!}</th></tr>
                        <tr><th>Age Group: </th><th>{!! $user->age->group or '<i>Unknown..</i>' !!}</th></tr>
                        <tr><th>Religion: </th><th>{!! $user->religion->name or '<i>Unknown..</i>' !!}</th></tr>
                        <tr><th>Education: </th><th>{!! $user->education->level or '<i>Unknown..</i>' !!}</th></tr>
                        <tr><th>Profession: </th><th>{!! $user->profession->category or '<i>Unknown..</i>'!!}</th></tr>
                        </tbody>
                    </table>
                </div>
                <br>

                <div>
                    <h4 class="text-primary">Contact me for:</h4>

                    @if( Auth::check() and $user->id == Auth::user()->id )
                            @if(!empty($user->add->matter) and $user->add->active == 1)
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">{{$user->add->heading}}
                                        <a role="button" href="{{url('adds/'.$user->add->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
                                    </h4><br>
                                    <p><b>{{$user->add->matter or 'Null'}}</b></p>
                                    <hr>
                                    <p class="mb-0"><b>Email: {{$user->email or 'Not given'}} | Contact: {{$user->mobile or 'Not given'}} | Location: {{$user->constituency->pc_name or 'Not given'}}</b></p>
                                </div>
                            @else
                                @include('layouts.partials.add-instruction')
                            @endif
                    @else
                        @if(!empty($user->add->matter) and $user->add->active == 1)
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">{{$user->add->heading}}</h4>
                                <br>
                                <p><b>{{$user->add->matter}}</b></p>
                                <hr>
                                <p class="mb-0"><b>Email: {{$user->email or 'Not given'}} | Contact: {{$user->mobile or 'Not given'}} | Location: {{$user->constituency->pc_name or 'Not given'}}</b></p>
                            </div>
                        @else
                            @include('layouts.partials.add-instruction')
                        @endif
                    @endif
                    {{--@if(Auth::guest())
                        @if(!empty($user->add->matter) and $user->add->active == 1)
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Contact me for:</h4>
                                <p><b>{{$user->add->matter}}</b></p>
                                <hr>
                                <p class="mb-0"><b>Email: {{$user->email or null}} | Contact: {{$user->mobile or 'Not given'}}</b></p>
                            </div>
                        @else
                            @include('layouts.partials.add-instruction')
                        @endif
                    @else
                        @if($user->id == Auth::user()->id )
                            @if(!empty($user->add->matter) and $user->add->active == 1)
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Contact me for:
                                        <a role="button" href="{{url('adds/'.$user->add->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a></h4>
                                    <p><b>{{$user->add->matter or 'Null'}}</b></p>
                                    <hr>
                                    <p class="mb-0"><b>Email: {{$user->email or null}} | Contact: {{$user->mobile or 'Not given'}}</b></p>
                                </div>
                            @else
                                @include('layouts.partials.add-instruction')
                            @endif
                        @else
                            @if(!empty($user->add->matter) and $user->add->active == 1)
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Contact me for:</h4>
                                    <p><b>{{$user->add->matter}}</b></p>
                                    <hr>
                                    <p class="mb-0"><b>Email: {{$user->email or null}} | Contact: {{$user->mobile or 'Not given'}}</b></p>
                                </div>
                            @else
                                @include('layouts.partials.add-instruction')
                            @endif
                        @endif
                    @endif--}}

                </div>

                <br>
                <div class="sharethis-inline-share-buttons"></div>

                <br>
                @can('manage_site')
                    <hr>
                    <div>
                        <h3>Upload Image</h3>
                        <br>
                        <form method="post" action="{{url('users/'.$user->id.'/upload-image')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputFile">Your Image:</label>
                                <input type="file" name="image" class="form-control-file" id="image" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input.
                                    It's a bit lighter and easily wraps to a new line.</small>
                            </div>

                            {{--<div class="form-group">
                                <label for="example-text-input" class="col-form-label">Profession:</label>
                                <div class="">
                                    <select name="profession" id="profession" class="form-control">
                                        <option selected value="">Select Profession</option>
                                        @foreach($professions as $profession)
                                            <option value="{{$profession->id}}">{{$profession->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>--}}

                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Heading:</label>
                                <div class="">
                                    <input class="form-control" type="text" name="heading" value="Artisanal kale" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Caption:</label>
                                <div class="">
                                    <input class="form-control" type="text" name="caption" value="Artisanal kale" id="example-text-input">
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Image</button>
                            </div>
                        </form>
                    </div>
                    <br><br>
                    @if($images->count())
                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Del</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $image)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <th scope="row">{{ $image->name }}</th>
                                        <td scope="row">
                                            <a href="{{url('images/'.$image->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        </td>
                                        <td scope="row">
                                            <form method="POST" action="{{url('images/'.$image->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Del</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endcan
            </div>
            <div class="col-md-3">
                <br>
                <br>
                <div align="center">
                    @if(file_exists(public_path().'/upload/'.$user->uuid.'.png'))
                        <img src="{{asset('upload/'.$user->uuid.'.png')}}" alt="Profile Pic" class="img-thumbnail" width="250" height="250">
                        <br>
                    @else
                        <img data-name="{{ $user->name }}" class="demo img-thumbnail img-responsive" width="250" height="250"/>
                        <br>
                    @endif
                    <br>
                    <b id="likeCount" class="text-success">{{$user->known_by_count}}</b><b> Likes</b>
                    <br>
                    @if(Auth::guest())
                        <a class="btn btn-info login-to-like" href="{{ url('loginToLike/'.$user->id) }}">
                            <i class="fa fa-thumbs-up" style="font-size:16px"></i>
                            Like Profile
                        </a>
                    @else

                        @if($user->id == Auth::user()->id)
                            <a href="#" role="button" class="btn btn-info self-profile">Self Profile</a>
                        @else
                            @if($i_know_already==1)
                                <form class="text-center">
                                    <input type="hidden" id="userId" value="{{$user->id}}">
                                    <button class="btn btn-info" id="ajaxLike" disabled="disabled"><i class="fa fa-thumbs-up" style="font-size:16px"></i> You Liked</button>
                                </form>
                            @else
                                <form class="text-center">
                                    <input type="hidden" id="userId" value="{{$user->id}}">
                                    <input type="hidden" id="userName" value="{{$user->name}}">
                                    <button class="btn btn-info" id="ajaxLike"><i class="fa fa-thumbs-up" style="font-size:16px"></i>   Like Profile</button>
                                </form>
                            @endif
                        @endif
                    @endif
                    <br>

                </div>
                <br>
               {{-- <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        What else you can do in this website? >>>
                    </div>
                </div>--}}
            </div>
        </div>
        <br>
        <br>
    </div>
@endsection

@section('extra-js')
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <script>
        function ConfirmDelete(){

            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

    <script>
        function confirmKnow(){

            var x = confirm("Do you know this person?");
            if (x)
                return true;
            else
                return false;
        }
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

    <script type="text/javascript">

        $('.self-profile').on('click', function () {
            $.alert({
                title: 'Self Profile!',
                content: 'You can\'t like your profile!',
                type: 'red'
            });
        });
    </script>

    <script>
        jQuery(document).ready(function(){
            jQuery('#ajaxLike').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({

                    beforeSend: function(){
                        /*if(confirm("Are you sure you want to submit the value ?"))
                            return true;
                        else
                            return false;*/
                        jQuery.confirm({
                            title: 'Congratulations!',
                            content: 'Are you sure?',
                            type: 'green',
                            buttons: {
                                omg: {
                                    text: 'Thank you!',
                                    btnClass: 'btn-green'
                                },
                                close: function () {
                                }
                            }
                        });


                    },
                    url: "{{ url('/users/like') }}",
                    method: 'post',
                    data: {
                        userid: jQuery('#userId').val()
                    },
                    /*success: function(result){
                        console.log(result);
                    }});*/
                    success: function(result){
                        /*jQuery('#ajaxAlert').html(
                            "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n" +
                            result.message
                        );
                        jQuery('#ajaxAlert').show();*/
                        jQuery('#likeCount').text(result.kbc);
                        //jQuery('#ajaxLike').replaceWith("<button class=\"btn btn-info\" id=\"ajaxLike\" disabled=\"disabled\"><i class=\"fa fa-thumbs-up\" style=\"font-size:16px\"></i> You Liked</button>");
                        jQuery('#ajaxLike').replaceWith('<button class="btn btn-info" id="ajaxLike" disabled="disabled"><i class="fa fa-thumbs-up" style="font-size:16px"></i> You Liked</button>');

                        jQuery.confirm({
                            title: 'Congratulations!',
                            content: result.message,
                            type: 'green',
                            buttons: {
                                omg: {
                                    text: 'Thank you!',
                                    btnClass: 'btn-green'
                                },
                                close: function () {
                                }
                            }
                        });

                    }
                });
            });
        });
    </script>
@endsection
