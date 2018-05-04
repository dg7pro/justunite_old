@extends('layouts.master')

@section('content')
    <div class="container">
        <br>
        <div class="row">

            <div class="col-md-9">
                <h2>{{$user->name}}
                    @can('manage_site')
                        <a href="{{url('users/'.$user->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                    @endcan
                </h2>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
                </div>
                <br>
                @if(isset($user->profession->details))
                    <div>
                        <h4 class="text-primary">Inspiration</h4>
                        <p>
                            <b>{!! $user->profession->details or null !!}</b>
                            {{--<a href="{{url('opinions/create')}}"><b>Add few lines</b></a>--}}
                            <i class="fa fa-thumbs-o-up like-btn text-success" style="font-size: 1.2em;"><b > 786</b> </i>
                        </p>
                    </div>
                @endif
                {{--@if(isset($user->opinion->matter))
                    <div>
                        <h4 class="text-primary">My Opinion:</h4>
                        <p>
                            <b>{!! $user->opinion->matter or null !!}</b>
                            <i class="fa fa-thumbs-o-up like-btn text-success" style="font-size: 1.2em;"><b > 786</b> </i>
                        </p>
                    </div>
                @endif--}}
                <br>
                <div>
                    <h4 class="text-primary">Personal Info</h4>
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
                {{--@can('manage_site')
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

                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Profession:</label>
                                <div class="">
                                    <select name="profession" id="profession" class="form-control">
                                        <option selected value="">Select Profession</option>
                                        @foreach($professions as $profession)
                                            <option value="{{$profession->id}}">{{$profession->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

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
                @endcan--}}
                <br>

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
                                <form class="form-inline">
                                    <input type="hidden" id="userId" value="{{$user->id}}">
                                    <button class="btn btn-info" id="ajaxLike" disabled="disabled"><i class="fa fa-thumbs-up" style="font-size:16px"></i> You Liked</button>
                                </form>
                            @else
                                <form class="form-inline">
                                    <input type="hidden" id="userId" value="{{$user->id}}">
                                    <input type="hidden" id="userName" value="{{$user->name}}">
                                    <button class="btn btn-info" id="ajaxLike"><i class="fa fa-thumbs-up" style="font-size:16px"></i>   Like Profile</button>
                                </form>
                            @endif
                        @endif
                    @endif
                    <br>
                        <h3 class="text-primary"><b id="likeCount">{{$user->known_by_count}}</b> people know {{$user->name}}</h3>
                </div>
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
