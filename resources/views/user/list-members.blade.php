@extends('layouts.master')

@section('content')

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of {{$constituency->pc_name}} Members
                    <a href="{{$whatsapp}}" role="button" class="btn btn-outline-success" ><i class="fa fa-whatsapp"> Join Whatsapp</i> </a>
                </h2>

                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Rank</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Opinion</th>
                        <th scope="col">Vote</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($users as $user)
                        <tr id="{{'row'.$user->id}}" style="{{$user->id == $receivedVoteUserId ? 'background-color: #06b0cf' : '' }}">

                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                @if(file_exists(public_path().'/upload/'.$user->uuid.'.png'))
                                    <img src="{{asset('upload/'.$user->uuid.'.png')}}" alt="Profile Pic" class="img-circle" width="50" height="50">
                                    <br>
                                @else
                                    <img data-name="{{ $user->name }}" class="demo img-responsive" width="50" height="50"/>
                                    <br>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('users/'.$user->id)}}" class="font-weight-bold text-primary">{{$user->name}}</a>
                                <div class="font-italic">Likes: {{$user->known_by_count or 'null'}}</div>
                            </td>
                            <td>
                                {{--<a href="#"><i class="fa fa-comments fa-2x"></i></a>--}}
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$user->id}}"><i class="fa fa-comments fa-2x"></i></a></td>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{$user->opinion->matter or 'Not Written'}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if(Auth::guest())
                                    <a class="btn btn-info" href="{{ url('loginToVoteUser/'.$constituency->id) }}">Vote</a>
                                @else
                                    @if($user->id == $receivedVoteUserId)
                                        <button type="submit" class="btn btn-default btn-xs disabled">Voted</button>
                                    @else
                                        <form method="post" action="{{url('users/vote/'.$user->id)}}" class="form-inline" onsubmit="{{ $receivedVoteUserId != null ? 'ConfirmVoteChange()' : ''}}">
                                            {{csrf_field()}}
                                            <input name="currentOption" type="hidden" value="{{$receivedVoteUserId}}">
                                            <button type="submit" class="btn btn-info btn-xs"><i class="fa fa-thumbs-up" style="font-size:16px"></i> Vote</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <br><br>


                {{--{{ $users->links('vendor.pagination.bootstrap-4') }}--}}

            </div>
            @include('layouts.partials.sidemenu')
        </div>
    </div>
    <br><br>
@endsection

@section('extra-js')

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
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
        function ConfirmVoteChange() {

            var x = confirm("You have already voted, do you want to change your vote?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

@endsection
