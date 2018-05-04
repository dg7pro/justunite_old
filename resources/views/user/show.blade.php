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
                {{--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('images/profile/doctor.jpg')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('images/profile/lawyer.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('images/profile/police.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>--}}

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($images as $image)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->iteration == 1 ? 'active' : ''}}"></li>
                            {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($images as $image)
                            <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : ''}}">
                                {{-- <img class="d-block w-100" src="{{asset('images/svg/'.$image->name)}}" alt="First slide">--}}
                                <img class="d-block w-100" src="{{asset('storage/'.$image->name)}}" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$image->heading}}</h5>
                                    <p>{{$image->caption}}</p>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="carousel-item">
                             <img class="d-block w-100" src="{{asset('images/svg/second.svg')}}" alt="Second slide">
                         </div>
                         <div class="carousel-item">
                             <img class="d-block w-100" src="{{asset('images/svg/third.svg')}}" alt="Third slide">
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
                </div>
                {{--<br>
                <div>
                    <a href="{{url('slider-image-crop')}}" role="button" class="btn btn-outline-warning">Upload slider images</a>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.<br>
                        <a href="{{url('uuid/'.$user->uuid)}}">{{'http://localhost/justunite/public/uuid/'.$user->uuid}}</a>
                    </div>
                </div>--}}
                <br>
                <div>
                    <h4 class="text-primary">Introduction:
                        <a href="{{url('opinions/create')}}" role="button" class="btn btn-sm btn-outline-info">Add Something</a>
                        <a href="#" role="button" class="btn btn-sm btn-outline-primary">Comment</a>
                    </h4>
                    <p>
                        <b>{!! $user->profession->details or null !!}</b>
                        {{--<button class="btn btn-outline-danger btn-sm" id="ajaxLike"><i class="fa fa-thumbs-up" style="font-size:16px"></i> 786</button>--}}
                        <i class="fa fa-thumbs-o-up like-btn text-success" style="font-size: 1.2em;"><b > 786</b> </i>

                        <form method="post" action="{{url('users/like-profession/'.$user->profession->id)}}" class="form-inline">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-outline-success btn-sm">
                                <i class="fa fa-thumbs-o-up like-btn" style="font-size: 1.2em;"></i>
                                <b>786</b>
                            </button>
                        </form>
                    </p>
                </div>
                <div>
                    <h4 class="text-primary">Your Opinion:
                        {{--<a href="{{url('opinions/create')}}" role="button" class="btn btn-sm btn-outline-info">Add Something</a>
                        <a href="#" role="button" class="btn btn-sm btn-outline-primary">Comment</a>--}}
                    </h4>
                    <p>
                        <b>{!! $user->opinion->matter or null !!}</b>
                        {{--<button class="btn btn-outline-danger btn-sm" id="ajaxLike"><i class="fa fa-thumbs-up" style="font-size:16px"></i> 786</button>--}}
                        <i class="fa fa-thumbs-o-up like-btn text-success" style="font-size: 1.2em;"><b > 786</b> </i>
                    </p>
                </div>
                <br>
                <div>
                    <h4 class="text-primary">Personal Info:</h4>
                    <table class="table table-bordered table-striped">
                        {{--<thead>
                        <tr>
                            <th scope="col" colspan="2" class="text-primary">Personal Info:</th>
                        </tr>
                        </thead>--}}
                        <tbody>
                        <tr><th>Name: </th><th>{{$user->name}}</th></tr>
                        <tr><th>Gender: </th><th>{!! ($user->gender == null)?'<i>Unknown..</i>':$user->gender->name !!}</th></tr>

                        <tr><th>Marital Status: </th><th>{!! ($user->marital == null)?'<i>Unknown..</i>':$user->marital->status !!}</th></tr>
                        <tr><th>Age Group: </th><th>{!! ($user->age == null)?'<i>Unknown..</i>':$user->age->group !!}</th></tr>
                        <tr><th>Religion: </th><th>{!! ($user->religion == null)?'<i>Unknown..</i>':$user->religion->name !!}</th></tr>
                        <tr><th>Education: </th><th>{!! ($user->education == null)?'<i>Unknown..</i>':$user->education->level !!}</th></tr>
                        <tr><th>Profession: </th><th>{!! $user->profession->category or '<i>Unknown..</i>'!!}</th></tr>
                        {{--<tr><th>Income: </th><th></th></tr>
                        <tr><th>Lok Sabha Seats(PC): </th><th>{{$state->pc}}</th></tr>
                        <tr><th>Vidhan Sabha Seats(AC): </th><th>{{$state->ac}}</th></tr>
                        <tr><th>Ruling Party: </th><th></th></tr>
                        <tr><th>Opposition Party: </th><th></th></tr>
                        <tr><th>Chief Minister: </th><th>{{$state->cm}}</th></tr>
                        <tr><th>Governor: </th><th>{{$state->governor}}</th></tr>
                        <tr><th>CEO: </th><th></th></tr>--}}
                        </tbody>
                    </table>
                </div>
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
                @endcan
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
                        {{--<img src="images/profile-pic.png" alt="Profile Pic" class="img-thumbnail" width="150" height="150">--}}
                    @endif
                    <br>

                    @if($user->id == Auth::user()->id)
                        <a href="#" role="button" class="btn btn-outline-success">Self Profile</a>
                    @else
                        @if($i_know_already==1)
                            <form method="post" action="{{url('users/revokeknow/'.$user->id)}}" class="form-inline" onsubmit="return confirmKnow()">
                                {{csrf_field()}}
                                {{--<input name="currentOption" type="hidden" value="{{$receivedVoteProblemId}}">--}}
                                <button type="submit" class="btn btn-outline-success">Cancel I Know</button>
                            </form>
                        @else
                            <form method="post" action="{{url('users/iknow/'.$user->id)}}" class="form-inline" onsubmit="return confirmKnow()">
                                {{csrf_field()}}
                                {{--<input name="currentOption" type="hidden" value="{{$receivedVoteProblemId}}">--}}
                                <button type="submit" class="btn btn-outline-success">I know {{$user->name}}</button>
                            </form>
                        @endif
                    @endif
                    <br>
                    <h3 class="text-primary">{{$user->known_by_count}} people know {{$user->name}}</h3>

                </div>
            </div>


        </div>
        <br>
        <br>
    </div>
@endsection

@section('extra-js')
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
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
@endsection
