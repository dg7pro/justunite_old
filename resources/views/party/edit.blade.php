@extends('layouts.master')

@section('content')
    <div class="container">
        <br>
        @include('layouts.alerts.flash')
        @include('layouts.alerts.errors')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br>
                <h2>
                    Edit Problem
                    @can('manage_site')
                        <a href="{{url('parties/'.$party->id)}}" role="button" class="btn btn-sm btn-outline-info">View</a>

                    @endcan
                </h2>


                <form method="post" action="{{url('parties/'.$party->id)}}">

                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <table class="table table-bordered table-striped">
                        {{--<thead>
                        <tr>
                            <th scope="col" colspan="2">Edit: {{ $state->name2}}</th>

                        </tr>
                        </thead>--}}
                        <tbody>
                        <tr>
                            <td colspan="2"><b>{{$party->name}}</b></td>
                        </tr>
                        <tr>
                            <td><label for="name">Name:</label></td>
                            <td><input type="text" name="name" class="form-control" value="{{$party->name}}"></td>
                        </tr>
                        <tr>
                            <td><label for="abbreviation">Short Form:</label></td>
                            <td><input type="text" name="abbreviation" class="form-control" value="{{$party->abbreviation}}"></td>
                        </tr>
                        <tr>
                            <td><label for="symbol">Symbol:</label></td>
                            <td><input type="text" name="symbol" class="form-control" value="{{$party->symbol}}"></td>
                        </tr>
                        <tr>
                            <td><label for="year">Year:</label></td>
                            <td><input type="text" name="year" class="form-control" value="{{$party->year}}"></td>
                        </tr>
                        <tr>
                            <td><label for="headquarter">Headquarter:</label></td>
                            <td colspan="2"><textarea name="headquarter" class="form-control" rows="3">{{$party->headquarter}}</textarea></td>
                        </tr>
                       {{-- <tr>
                            <td colspan="2"><b>Details Information:</b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><textarea name="details" class="form-control" rows="10">{{$party->details}}</textarea></td>
                        </tr>--}}



                        <tr>
                            <td colspan="2"><b>Top Leadership:</b></td>
                        </tr>
                        <tr>
                            <td><label for="president">President:</label></td>
                            <td><input type="text" name="president" class="form-control" value="{{$party->president}}"></td>
                        </tr>
                        <tr>
                            <td><label for="leader">Leadership:</label></td>
                            <td colspan="2"><textarea name="leadership" class="form-control" rows="3">{{$party->leadership}}</textarea></td>
                        </tr>
                        <tr>
                            <td><label for="founder">Founder:</label></td>
                            <td colspan="2"><textarea name="founder" class="form-control" rows="3">{{$party->founder}}</textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Details Information:</b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><textarea id="party-details" name="details" class="form-control" rows="10">{{$party->details}}</textarea></td>
                        </tr>


                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-success">Update</button>

                </form>

                <br>
                <br>




                <br>

                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Description & Notes:</h4>
                    <p>Each group has different voting power. User can belong to 2 or more groups, their voting power adds up.
                        Like any women can be member of Women Wing as well as ETF her total voting power will be 2+3=5 </p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>

                <br>
                <br>
                <br>


            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        CKEDITOR.replace( 'party-details');

        function ConfirmDelete(){

            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;

        }
    </script>
@endsection