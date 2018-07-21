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
                <div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr><th>Name: </th><th>{{$user->name}}</th></tr>
                        <tr><th>Email: </th><th>{{$user->email}}</th></tr>
                        <tr><th>Mobile: </th><th>{{$user->mobile}}</th></tr>
                        <tr><th>Constituency: </th><th>{{ $user->constituency->pc_name .' ('. $user->constituency->state->name2 .')' }}</th></tr>
                        <tr><th>Group: </th><th>{{$user->group->name}}</th></tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div>
                    <h4 class="text-primary">Personal Info:</h4>
                    <table class="table table-bordered table-striped">
                        <tbody>
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

                    /*beforeSend: function(){
                        /!*if(confirm("Are you sure you want to submit the value ?"))
                            return true;
                        else
                            return false;*!/
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
                    },*/
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

                        $.alert({
                            title: 'Congratulations!',
                            content: result.message,
                            type: 'green'
                            /*buttons: {
                                omg: {
                                    text: 'Thank you!',
                                    btnClass: 'btn-green'
                                },
                                close: function () {
                                }
                            }*/
                        });

                    }
                });
            });
        });
    </script>
@endsection
