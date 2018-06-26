@extends('layouts.master')

@section('content')
    <div class="container">
        <br>
        @include('layouts.alerts.success')
        @include('layouts.alerts.error')
        <div class="row">
            <div class="col-md-9">
                <h2>
                    Blurb Active Constituencies
                    @can('manage_site')
                        <a href="{{url('blurbs')}}" role="button" class="btn btn-sm btn-outline-success">All Blurbs</a>
                    @endcan
                </h2>
                <div>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">State</th>
                            <th scope="col">Constituency</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($blurb->constituencies as $constituency)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>
                                <th scope="row">{{$constituency->id}}</th>
                                <th><a href="#">{{$constituency->state->name2}}</a></th>
                                <th><a href="#">{{$constituency->pc_name}}</a></th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <br><br>

                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Attach CONSTITUENCY:</h4>
                    <br>
                    <form method="POST" action="{{url('blurbs/attach-constituency/'.$blurb->id)}}">
                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <select name="state" id="state" class="form-control">
                                        <option value="">Select State...</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->name2}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">

                                    <select id="constituency" name="constituency" class="form-control">
                                        <option value="">Select State first...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Attach</button>
                    </form>
                </div>
                <br>

            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
                @include('layouts.partials.side-add')
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