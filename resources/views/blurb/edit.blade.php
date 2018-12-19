@extends('layouts.master')

@section('content')
    <div class="container">
        <br>
        @include('layouts.alerts.flash')
        @include('layouts.alerts.errors')
        <div class="row">
            <div class="col-md-9">
                <h2>
                    Edit Blurb
                    @can('manage_site')
                        <a href="{{url('blurbs')}}" role="button" class="btn btn-sm btn-outline-success">All Blurbs</a>
                    @endcan
                </h2>

                <div>
                    <form method="post" action="{{url('blurbs/'.$blurb->id)}}" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputFile">Your Image:</label>
                            <input type="file" name="image" class="form-control-file" id="image" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input.
                                It's a bit lighter and easily wraps to a new line.</small>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-form-label">Image:</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="image" value="{{$blurb->image}}" id="image" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-form-label">Name:</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="name" value="{{$blurb->name}}" id="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="link" class="col-form-label">Link:</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="link" value="{{$blurb->link}}" id="link">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select name="type" id="type" class="form-control">
                                <option selected value="">Select Sequence...</option>
                                <option value="square" {{ $blurb->type == 'square' ? 'selected="selected"' : '' }}>Square</option>
                                <option value="vertical" {{ $blurb->type == 'vertical' ? 'selected="selected"' : '' }}>Vertical</option>
                                <option value="horizontal" {{ $blurb->type == 'horizontal' ? 'selected="selected"' : '' }}>Horizontal</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
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
                var blurbID = $(#(presentBlurb)).val();
                if(stateID) {
                    $.ajax({
                        url: 'blurbs/states/ajax/'+stateID,
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
