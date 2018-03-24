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
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('images/svg/first.svg')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('images/svg/second.svg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('images/svg/third.svg')}}" alt="Third slide">
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
                </div>
                <br>
                <div>
                    <a href="{{url('slider-image-crop')}}" role="button" class="btn btn-outline-warning">Upload slider images</a>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.<br>
                        <a href="{{'http://www.justunite.org/users/'.$user->uuid}}">{{'http://www.justunite.org/users/'.$user->uuid}}</a>
                    </div>
                </div>
                <br>
                <div>
                    <h4 class="text-primary">My Views/Opinion</h4>
                    <p><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                            a galley of type and scrambled it to make a type specimen book. It has survived not only
                            five centuries, but also the leap into electronic typesetting, remaining essentially
                            unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                            including versions of Lorem Ipsum.</b></p>
                </div>
                <br>
                <div>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th scope="col" colspan="2" class="text-primary">Personal Info:</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><th>Name: </th><th>{{$user->name}}</th></tr>
                        <tr><th>Gender: </th><th>{{$user->gender->name}}</th></tr>
                        <tr><th>Marital Status: </th><th>{{$user->marital->status}}</th></tr>
                        <tr><th>Age Group: </th><th>{{$user->age->group}}</th></tr>
                        <tr><th>Religion: </th><th>{{$user->religion->name}}</th></tr>
                        <tr><th>Education: </th><th>{{$user->education->level}}</th></tr>
                        <tr><th>Profession: </th><th>{{$user->profession->category}}</th></tr>
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
                    <a href="#" role="button" class="btn btn-outline-success">I know {{$user->name}}</a>
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
