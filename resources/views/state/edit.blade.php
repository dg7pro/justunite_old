@extends('layouts.master')

@section('content')
    <div class="container">
        <br>
        @include('layouts.alerts.success')
        @include('layouts.alerts.error')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br>
                <br>
                <h2>Edit Existing State
                    @can('manage_site')
                        <a href="{{url('states/'.$state->id)}}" role="button" class="btn btn-sm btn-outline-info">View</a>
                    @endcan
                </h2>
                <form method="post" action="{{url('states/'.$state->id)}}">

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
                            <td colspan="2"><b>{{$state->name}}</b></td>
                        </tr>
                        <tr>
                            <td><label for="name2">Name:</label></td>
                            <td><input type="text" name="name2" class="form-control" value="{{$state->name2}}"></td>
                        </tr>
                        <tr>
                            <td><label for="capital">Capital:</label></td>
                            <td><input type="text" name="capital" class="form-control" value="{{$state->capital}}"></td>
                        </tr>
                        <tr>
                            <td><label for="language">language:</label></td>
                            <td>
                                @foreach($state->languages as $language)
                                    {{$language->name.', '}}
                                @endforeach
                                <a href="{{url('states/'.$state->id.'/list-languages')}}" role="button" class="btn btn-sm btn-outline-info">Attach</a>

                            </td>
                        </tr>
                        <tr>
                            <td><label for="literacy">literacy %:</label></td>
                            <td><input type="text" name="literacy" class="form-control" value="{{$state->literacy}}"></td>
                        </tr>




                        <tr>
                            <td colspan="2"><b>Population Info:</b></td>
                        </tr>
                        <tr>
                            <td><label for="population">Population:</label></td>
                            <td><input type="text" name="population" class="form-control" value="{{$state->population}}"></td>
                        </tr>
                        <tr>
                            <td><label for="upo">Urban Population:</label></td>
                            <td><input type="text" name="upo" class="form-control" value="{{$state->upo}}"></td>
                        </tr>
                        <tr>
                            <td><label for="rpo">Rural Population:</label></td>
                            <td><input type="text" name="rpo" class="form-control" value="{{$state->rpo}}"></td>
                        </tr>
                        <tr>
                            <td><label for="rank">Population Rank:</label></td>
                            <td><input type="text" name="rank" class="form-control" value="{{$state->rank}}"></td>
                        </tr>
                        <tr>
                            <td><label for="density">Density:</label></td>
                            <td><input type="text" name="density" class="form-control" value="{{$state->density}}"></td>
                        </tr>
                        <tr>
                            <td><label for="sex_ratio">Sex Ratio:</label></td>
                            <td><input type="text" name="sex_ratio" class="form-control" value="{{$state->sex_ratio}}"></td>
                        </tr>




                        <tr>
                            <td colspan="2"><b>Election Information:</b></td>
                        </tr>
                        <tr>
                            <td><label for="pc">Parliamentary Seats:</label></td>
                            <td><input type="text" name="pc" class="form-control" value="{{$state->pc}}"></td>
                        </tr>
                        <tr>
                            <td><label for="ac">Assembly Seats:</label></td>
                            <td><input type="text" name="ac" class="form-control" value="{{$state->ac}}"></td>
                        </tr>
                        <tr>
                            <td><label for="governor">Governor:</label></td>
                            <td><input type="text" name="governor" class="form-control" value="{{$state->governor}}"></td>
                        </tr>
                        <tr>
                            <td><label for="cm">Chief Minister:</label></td>
                            <td><input type="text" name="cm" class="form-control" value="{{$state->cm}}"></td>
                        </tr>
                        <tr>
                            <td><label for="wparty">Ruling:</label></td>
                            <td>
                                {{--<input type="text" name="wparty" class="form-control" value="{{$state->wparty}}">--}}
                                <select name="ruling_id" class="form-control">
                                    <option value="">Select Ruling party</option>
                                    @foreach($parties as $party)
                                        <option value="{{$party->id}}" {{ $state->ruling_id == $party->id ? 'selected="selected"' : '' }}>{{$party->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="wparty">Opposition:</label></td>
                            <td>
                                {{--<input type="text" name="wparty" class="form-control" value="{{$state->wparty}}">--}}
                                <select name="opposition_id" class="form-control">
                                    <option value="">Select Opposition party</option>
                                    @foreach($parties as $party)
                                        <option value="{{$party->id}}" {{ $state->opposition_id == $party->id ? 'selected="selected"' : '' }}>{{$party->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                       {{-- <tr>
                            <td><label for="">:</label></td>
                            <td><input type="text" name="" class="form-control" value="{{$state->}}"></td>
                        </tr>
                        <tr>
                            <td><label for="">:</label></td>
                            <td><input type="text" name="" class="form-control" value="{{$state->}}"></td>
                        </tr>
                        <tr>
                            <td><label for="">:</label></td>
                            <td><input type="text" name="" class="form-control" value="{{$state->}}"></td>
                        </tr>
                        <tr>
                            <td><label for="">:</label></td>
                            <td><input type="text" name="" class="form-control" value="{{$state->}}"></td>
                        </tr>--}}

                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-success">Update</button>

                </form>

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