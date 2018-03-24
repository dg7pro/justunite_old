@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br>
                <br>
                <h2>Attach Parties to::  <a href="{{url('states/'.$state->id)}}">{{ $state->name2}}</a>

                </h2>
                <form method="post" action="{{url('states/'.$state->id.'/attach-parties')}}">


                    {{ csrf_field() }}

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Parties</th>
                            <th scope="col">Check</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($parties as $party)
                            @if(in_array($party->id, $active_parties))
                                <tr style="background-color: #06b0cf">
                                    <th scope="row">{{ $party->id }}</th>
                                    <td>
                                        <a href="{{url('parties/'.$party->id)}}"><b>{{$party->name}}</b></a>

                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="parties_id[]" value="{{$party->id}}" checked>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <th scope="row">{{ $party->id }}</th>
                                    <td>
                                        <a href="{{url('parties/'.$party->id)}}"><b>{{$party->name}}</b></a>

                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="parties_id[]" value="{{$party->id}}">
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach






                        </tbody>
                    </table>
                    <div align="right">
                        <button type="submit" class="btn btn-outline-success">Attach Parties</button>
                    </div>


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