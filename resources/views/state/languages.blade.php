@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br>
                <br>
                <h2>Attach Languages to::  <a href="{{url('states/'.$state->id)}}">{{ $state->name2}}</a>

                </h2>
                <form method="post" action="{{url('states/'.$state->id.'/attach-languages')}}">


                    {{ csrf_field() }}

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Language</th>
                            <th scope="col">Check</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($languages as $language)
                            @if(in_array($language->id, $active_languages))
                                <tr style="background-color: #06b0cf">
                                    <th scope="row">{{ $language->id }}</th>
                                    <td>
                                        <a href="{{url('languages/'.$language->id)}}"><b>{{$language->name}}</b></a>

                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="languages_id[]" value="{{$language->id}}" checked>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <th scope="row">{{ $language->id }}</th>
                                    <td>
                                        <a href="{{url('languages/'.$language->id)}}"><b>{{$language->name}}</b></a>

                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="languages_id[]" value="{{$language->id}}">
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach






                        </tbody>
                    </table>
                    <div align="right">
                        <button type="submit" class="btn btn-outline-success">Attach Languages</button>
                    </div>


                </form>

                <br>
                <br>

                <div>
                    @php
                        $previous = $state->id - 1 ;
                        $next = $state->id + 1 ;
                    @endphp

                    @if($previous == 0)
                        <a role="button" class="btn btn-outline-info btn-sm pull-left the-end" >&laquo; Previous </a>
                    @else
                        <a href="{{url('states/'.$previous.'/list-languages')}}" role="button" class="btn btn-outline-info btn-sm pull-left" >&laquo; Previous </a>
                    @endif

                    @if($next > $stateCount)
                        <a role="button" class="btn btn-outline-info btn-sm pull-right the-end" >Next &raquo;</a>
                    @else
                        <a href="{{url('states/'.$next.'/list-languages')}}" role="button" class="btn btn-outline-info btn-sm pull-right" >Next &raquo;</a>
                    @endif
                </div>

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
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <script type="text/javascript">
        $('.the-end').on('click', function () {
            $.alert({
                title: 'The End !',
                content: 'You have reached the edge !',
                type: 'red'
            });
        });
    </script>

@endsection