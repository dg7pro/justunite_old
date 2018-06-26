@extends('layouts.master')

@section('content')

    <div class="jumbotron color4">
        <div class="container">
            <h1 class="display-3">Parties Ajax</h1>
            <p>This page shows list of all the important political parties in India.</p>
            <p>
                <a href="{{$whatsapp}}" role="button" class="btn btn-outline-warning" ><i class="fa fa-whatsapp"> Join Whatsapp</i></a>
            {{--<a href="#" role="button" class="btn btn-outline-warning" >Vote &raquo;</a></p>--}}
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of Parties
                    <a href="{{$whatsapp}}" role="button" class="btn btn-outline-success" ><i class="fa fa-whatsapp"> Join Whatsapp</i></a>
                </h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Parties</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Select</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                            {{--<th scope="col">Del</th>--}}
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parties as $party)

                        @if(Auth::guest())
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{url('parties/'.$party->id)}}"><b>{{$party->name}}</b></a>

                                </td>
                                <td>{{$party->votes_count}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ url('loginToVoteParty') }}">Vote</a>
                                </td>

                            </tr>
                        @else
                            <tr id="{{'row'.$party->id}}" style="{{$party->id == $receivedVotePartyId ? 'background-color: #06b0cf' : '' }}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{url('parties/'.$party->id)}}"><b>{{$party->name}}</b></a>
                                </td>
                                <td>{{$party->votes_count}}</td>



                                <td>
                                    <form class="form-inline">
                                        <input name="currentOption" id="currentOption" type="hidden" value="{{$receivedVotePartyId}}">
                                        <input name="newOption" id="newOption" type="hidden" value="{{$party->id}}">
                                        <button class="btn btn-info btn-xs ajaxVote" data-id="{{ $party->id }}" id="{{'ajaxVote'.$party->id}}" {{$party->id == $receivedVotePartyId ? 'disabled' : '' }}>
                                            <i class="fa fa-thumbs-up" style="font-size:16px"></i> Vote
                                        </button>
                                    </form>
                                </td>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('parties/'.$party->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                    </td>
                                @endcan
                            </tr>
                        @endif

                    @endforeach

                    </tbody>
                </table>
                <br>
                <br>

            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
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
        function ConfirmVoteChange(){

            var x = confirm("You have already voted, do you want to change your vote?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

    <script>
        jQuery(document).ready(function(){
            jQuery('.ajaxVote').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                let id = $(this).data('id');
                jQuery.ajax({
                    url: "parties/ajax-vote/"+id,
                    method: 'post',
                    data: {
                        currentOption: jQuery('#currentOption').val(),
                        newOption: jQuery('#newOption').val()
                    },
                    /* success: function(result){
                         console.log(result);
                     }*/
                    success: function(result){
                        jQuery('#ajaxAlert').html(
                            "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n" +
                            result.message
                        );
                        jQuery('#ajaxAlert').show();
                        jQuery('tr').css("background-color", "");
                        jQuery('#row'+result.id).css({"background-color":"#06b0cf"});
                        jQuery('button').removeAttr("disabled");
                        jQuery('#ajaxVote'+result.id).attr("disabled", "disabled");

                        //jQuery('#likeCount').text(result.kbc);
                        //jQuery('#ajaxLike').replaceWith("<button class=\"btn btn-info\" id=\"ajaxLike\" disabled=\"disabled\"><i class=\"fa fa-thumbs-up\" style=\"font-size:16px\"></i> You Liked</button>");
                        //jQuery('#ajaxLike').replaceWith('<button class="btn btn-info" id="ajaxLike" disabled="disabled"><i class="fa fa-thumbs-up" style="font-size:16px"></i> You Liked</button>');
                    }
                });
            });
        });
    </script>
@endsection
