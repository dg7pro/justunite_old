@extends('layouts.master')

@section('content')

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-9">
                <h3>
                    2014 Loksabha Election Result: <i class="text-primary">{{$constituency->pc_name}}</i>
                </h3>

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


                <br>
                <br>
                @include('layouts.partials.track')
                <br>
                <br>


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

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="state"]').on('change', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: 'constituencies/contestants/states/ajax/'+stateID,
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
