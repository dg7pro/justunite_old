@extends('layouts.master')

@section('content')

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-9">
                <h2>
                    2014 Results: {{$constituency->pc_name}}
                    <a href="{{$whatsapp}}" role="button" class="btn btn-outline-success" ><i class="fa fa-whatsapp"></i> Join Whatsapp</a>
                </h2>

                <table class="table table-bordered table-condensed">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Rank</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Party</th>
                        <th scope="col">Votes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contestants as $contestant)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <th scope="row">{{$contestant->name or 'null'}}
                                @if($loop->iteration ==1)
                                    <span class="badge badge-success">{{'Winner'}}</span>
                                @elseif($loop->iteration ==2)
                                    <span class="badge badge-danger">{{'RunnerUp'}}</span>
                                @endif
                            </th>
                            <th scope="row">{{$contestant->gender->name or 'null'}}</th>
                            <th scope="row">{{$contestant->party or 'null'}}</th>
                            <th scope="row">{{number_format($contestant->votes)}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br><br>


                {{--{{ $users->links('vendor.pagination.bootstrap-4') }}--}}

            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
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
