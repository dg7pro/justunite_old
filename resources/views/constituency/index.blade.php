@extends('layouts.master')

@section('content')

    <div class="jumbotron color3">
        <div class="container">
            <h2 class="display-4">Loksabha Seats</h2>
            <p><b>The page shows list of all the parliamentary constituency in India. Total their are 543 seats</b></p>
            @if(Auth::guest())
                <p>
                    <a href="{{url('register')}}" role="button" class="btn btn-outline-dark" >Register &raquo;</a>
                </p>
            @else
                <p>
                    <a href="{{url('constituencies/your-constituency')}}" role="button" class="btn btn-outline-dark" >Your Constituency &raquo;</a>
                </p>
            @endif

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>List of Constituencies: <i class="text-primary">{{ $constituencies->count()}}</i></h2>
                {{--<div>
                 <p>
                    <b>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                        like Aldus PageMaker including versions of Lorem Ipsum.
                    </b>
                </p>
                </div>--}}

                <div style="height: 75vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Constituency Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">State</th>
                        @can('manage_site')
                            <th scope="col">Edit</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($constituencies as $constituency)
                       {{-- <tr style="background-color: #0d3625">--}}
                        <tr>

                            <th scope="row">{{$constituency->id}}</th>
                            <th class="text-primary"><a href="{{url('constituencies/'.$constituency->id)}}"> {{$constituency->pc_name}}</a></th>
                            <th class="text-primary">{{$constituency->ctype->name}}</th>
                            <td ><a href="{{url('states/'.$constituency->state->id)}}"><b class="text-primary"> {{$constituency->state->name2}}</b> </a></td>
                            @can('manage_site')
                                <th class="text-primary">
                                    <a href="{{url('constituencies/'.$constituency->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                </th>
                            @endcan
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
                <br>
                <hr>
               {{-- <br>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Description & Notes:</h4>
                    <p>Each group has different voting power. User can belong to 2 or more groups, their voting power adds up.
                        Like any women can be member of Women Wing as well as ETF her total voting power will be 2+3=5 </p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>--}}

                <br>
                @include('layouts.partials.track')
                <br>

            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>

        </div>
    </div>

    <br>
    <br>
    <br>
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
@endsection