@extends('layouts.master')

@section('content')

    <div class="jumbotron color2">
        <div class="container">
            <h2 class="display-4">Problems</h2>
            <p>
                <b>71 years, of Independence, more than 2000 national and regional Political Parties, but still unable
                    to solve these 27 major problems. Hope this time we chose Prime minister who can solve
                    all these problems
                </b>
            </p>
            <p>
                {{--<a href="{{url('problems/voting')}}" role="button" class="btn btn-outline-dark" >Most Serious Problem &raquo;</a>--}}
                <a href="{{$whatsapp}}" role="button" class="btn btn-outline-dark" ><i class="fa fa-whatsapp"></i> Join Whatsapp</a>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @include('layouts.partials.login-modal')
                <h2>
                    List of Problems
                    <a href="{{$whatsapp}}" role="button" class="btn btn-outline-success" ><i class="fa fa-whatsapp"></i> Join Whatsapp</a>
                </h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Rank</th>
                        <th scope="col">Problems</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Select</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($problems as $problem)
                        @if(Auth::guest())
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{url('problems/'.$problem->id)}}"><b class="text-primary">{{$problem->title}}</b></a>
                                </td>
                                <td><b class="text-primary">{{$problem->votes_count}}</b></td>
                                <td>
                                    <button type="button" class="btn btn-info" style="font-size:16px" data-toggle="modal" data-target="#exampleModalCenter">
                                        <i class="fa fa-thumbs-up"></i> Vote
                                    </button>
                                </td>
                            </tr>
                        @else
                            @if($problem->id == $receivedVoteProblemId)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{url('problems/'.$problem->id)}}"><b class="text-primary">{{$problem->title}}</b></a>
                                    </td>
                                    <td><b  class="text-primary">{{$problem->votes_count}}</b></td>
                                    <td>
                                       {{-- <img src="{{asset('images/vote.png')}}" width="30em" height="30em" class="mx-auto d-block">--}}
                                        {{--<img src="{{asset('images/vote2.png')}}" width="30em" height="30em"><b>oted</b>--}}
                                         {{--<img src="{{asset('images/vote.png')}}" width="30em" height="30em">--}}
                                        <i class="fa fa-check" style="font-size: 25px; color: crimson">oted</i>
                                        {{--<button type="submit" class="btn btn-default btn-xs disabled"> Voted</button>--}}
                                    </td>
                                    @can('manage_site')
                                        <td>
                                            <a href="{{url('problems/'.$problem->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        </td>
                                    @endcan
                                </tr>
                            @else
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{url('problems/'.$problem->id)}}"><b class="text-primary">{{$problem->title}}</b></a>
                                    </td>
                                    <td><b class="text-primary">{{$problem->votes_count}}</b></td>
                                    <td>
                                        {{--<form method="post" action="{{url('problems/vote/'.$problem->id)}}" class="form-inline" onsubmit="{{ $receivedVoteProblemId != null ? 'return ConfirmVoteChange()' : ''}}">
                                            {{csrf_field()}}
                                            <input name="currentOption" type="hidden" value="{{$receivedVoteProblemId}}">
                                            --}}{{--<button type="submit" class="btn btn-info btn-xs"><i class="fa fa-thumbs-up" style="font-size:16px"></i> Vote</button>--}}{{--
                                            <button type="submit" class="ajaxVote btn btn-info btn-xs" data-id="{{$problem->id}}" ><i class="fa fa-thumbs-up" style="font-size:16px"></i> Vote</button>
                                        </form>--}}

                                        <form class="form-inline">
                                            <input id="currentOption" type="hidden" value="{{$receivedVoteProblemId}}">
                                            {{--<button type="submit" class="btn btn-info btn-xs"><i class="fa fa-thumbs-up" style="font-size:16px"></i> Vote</button>--}}
                                            <button type="submit" class="ajaxVote btn  btn-info" data-id="{{$problem->id}}" ><i class="fa fa-thumbs-up" style="font-size:16px"></i> Vote</button>
                                        </form>
                                    </td>
                                    @can('manage_site')
                                        <td>
                                            <a href="{{url('problems/'.$problem->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        </td>

                                    @endcan
                                </tr>
                            @endif
                        @endif

                    @endforeach

                    </tbody>
                </table>

                <br>
                @include('layouts.partials.track')

                <br>
                <br>
                {{--<p><a href="{{url('problems/voting')}}" role="button" class="btn btn-outline-dark" >Most Serious Problem &raquo;</a></p>
                <br>--}}
            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>
    <br><br>
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
    <script>
        onload=function(){
            var s=document.getElementById("state");
            var c=document.getElementById("constituency");
            if(s.value!=null)
                s.value="";
            c.value="";
        }
    </script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery('.ajaxVote').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    beforeSend: function(){
                        if(confirm("Are you sure ?"))
                            return true;
                        else
                            return false;
                    },

                    url: "{{ url('/vote-problem') }}",
                    method: 'post',
                    data: {
                        problemid: $(this).data('id'),
                        currentid: $('#currentOption').val()
                    },
                    /*success: function(result){
                        console.log(result);
                    }*/

                    success: function(result){
                        //jQuery('#likeCount').text(result.kbc);
                        jQuery("[data-id='"+result.id+"']").replaceWith('<img src="{{asset('images/loader1.gif')}}" height="20px" width="20px" class="align-centre">');

                        if(result.safalta == true){ // if true (1)
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1000);
                        }

                        $.confirm({
                            title: 'Just Unite!',
                            content: result.message,
                            type: result.color,
                            buttons: {
                                omg: {
                                    text: 'Thank you!',
                                    btnClass: 'btn-'+result.color,
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
