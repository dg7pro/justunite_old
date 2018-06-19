@extends('layouts.master')

@section('content')

    <div>
        <div class="container">


            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1 align="center">Total Nationwide JU members: {{ $members }}</h1>
            <div class="text-center">
                <br>
                @if(Auth::guest())
                    <a href="{{ url('loginToContinue') }}" class="btn btn-success">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                @else
                    <a href="{{ url('problems') }}" class="btn btn-outline-danger">Problems / समस्याएं</a>
                    <a href="{{ url('parties') }}" class="btn btn-outline-primary">Parties / राजनीतिक दल</a>
                @endif
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

        </div>
    </div>


@endsection
