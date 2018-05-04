@extends('layouts.master')

@section('content')
    <div class="jumbotron color6">
        <div class="container">
            <h1 class="display-3">Problem vs Party !</h1>
            <p><b>Thousand of parties not a single problem solved in 70 years after Independence</b></p>
            <p><a href="{{$whatsapp}}" role="button" class="btn btn-success" ><i class="fa fa-whatsapp"> Join Whatsapp</i> </a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <b>Which is most the serious problem in India ?</b>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body"><b>
                                Select which is the most serious problem of India or which problem has affected you
                                and common public the most? And when these major problems will get solved ? We have listed
                                all the major problems which India is currently facing ?</b>
                                <br><br>
                                <a href="{{url('problems')}}" class="btn btn-danger">All Problems</a>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <b>Which political party do you support ?</b>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body"><b>
                                There are more than 1800 political parties in India, of which only few are National parties,
                                while some function at state level.
                                Different states have different state level active parties. We have listed all the active
                                parties at national as well as state levels in India. See the complete list of political parties
                                in India and vote for your party to support it.</b>
                                <br><br>
                                <a href="{{url('parties')}}" class="btn btn-success">All Parties</a>
                            </div>
                        </div>
                    </div>
                    {{--<div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <b>Collapsible Group Item #3</b>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        {{--<div class="row">
            --}}{{--<div class="col-md-8 col-md-offset-2">
                <h2>Which is most serious Problem ?</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S No.</th>
                        <th scope="col">Problems</th>
                        <th scope="col">Votes</th>
                        <th scope="col">Select</th>
                    </tr>
                    </thead>
                    <tbody>
                    --}}{{----}}{{--{!! $receivedVoteOptionId = null !!}--}}{{----}}{{-- --}}{{----}}{{--Option Id which auth user voted for--}}{{----}}{{--
                    @foreach($problems as $problem)
                        --}}{{----}}{{--@foreach($option->votes as $vote)
                            {{$vote->user_id}}
                            @if(Auth::user()->id == $vote->user_id)
                                {{! $receivedVoteOptionId = $option->id }}
                                --}}{{----}}{{----}}{{----}}{{--@php
                                    $receivedVoteOptionId = $user->id
                                @endphp--}}{{----}}{{----}}{{----}}{{--
                            @endif
                        @endforeach

                        <b>{{$receivedVoteOptionId}}</b>
                        <hr>--}}{{----}}{{--
                        @if($problem->id == $receivedVoteProblemId)
                            <tr style="background-color: #0d3625">
                                <th scope="row">{{$problem->id}}</th>
                                <td>{{$problem->title}}</td>
                                <td>{{$problem->votes_count}}</td>
                                <td>
                                    <button type="submit" class="btn btn-default btn-xs">Voted</button>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <th scope="row">{{$problem->id}}</th>
                                <td>{{$problem->title}}</td>
                                <td>{{$problem->votes_count}}</td>
                                <td>
                                    <form method="post" action="{{url('problems/vote/'.$problem->id)}}" class="form-inline">
                                        {{csrf_field()}}
                                        <input name="currentOption" type="hidden" value="{{$receivedVoteProblemId}}">
                                        <button type="submit" class="btn btn-success btn-xs">Vote</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
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


            </div>--}}{{--
        </div>--}}

    </div>
@endsection