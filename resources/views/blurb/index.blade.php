@extends('layouts.master')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>
                    List of Blurbs
                </h2>
                <div style="height: 75vh; overflow: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Add Name</th>
                            @can('manage_site')
                                <th scope="col">Edit</th>
                            @endcan

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($blurbs as $blurb)
                            {{-- <tr style="background-color: #0d3625">--}}
                            <tr>
                                <th scope="row">{{$blurb->id}}</th>
                                <th><a href="#">{{$blurb->name}}</a></th>
                                @can('manage_site')
                                    <td>
                                        <a href="{{url('blurbs/'.$blurb->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        <a href="{{url('blurbs/constituencies/'.$blurb->id)}}" role="button" class="btn btn-sm btn-outline-warning">Attach</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <br><br>
                @can('manage_site')
                    <hr>
                    <div>
                        <h3>Upload Image</h3>
                        <br>
                        <form method="post" action="{{url('blurbs/upload-image')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputFile">Your Image:</label>
                                <input type="file" name="image" class="form-control-file" id="image" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input.
                                    It's a bit lighter and easily wraps to a new line.</small>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-form-label">Name:</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="name" value="" id="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link" class="col-form-label">Link:</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="link" value="" id="link">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select name="type" id="type" class="form-control">
                                    <option selected value="">Select Sequence...</option>
                                    <option value="square">Square</option>
                                    <option value="vertical">Vertical</option>
                                    <option value="horizontal">Horizontal</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="type">State:</label>
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
                                    <label for="type">Location:</label>
                                    <div class="input-group">
                                        <select id="constituency" name="constituency" class="form-control">
                                            <option value="">Select State first...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Image</button>
                            </div>
                        </form>
                    </div>
                    {{--<br><br>
                    @if($images->count())
                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Del</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $image)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <th scope="row">{{ $image->name }}</th>
                                        <td scope="row">
                                            <a href="{{url('images/'.$image->id.'/edit')}}" role="button" class="btn btn-sm btn-outline-info">Edit</a>
                                        </td>
                                        <td scope="row">
                                            <form method="POST" action="{{url('images/'.$image->id)}}" class="form-inline" onsubmit="return ConfirmDelete()">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Del</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif--}}
                @endcan
                <br><br>



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
