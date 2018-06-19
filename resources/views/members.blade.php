@extends('layouts.master')

@section('content')


    <div class="tab-content">
        <section class="section section--active color1" data-letter="a" style="height: 90vh">
            <article class="section__wrapper">
                <h1 class="section__title" style="color: #989A9D">Members: {{ $members }}</h1>
                <br>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p>
                    @if(Auth::guest())
                        <a href="{{route('login')}}" role="button" class="btn btn-outline-success">Login</a>
                        <a href="{{route('register')}}" role="button" class="btn btn-outline-primary">Register</a>
                    @else
                        <a href="{{url('problems')}}" role="button" class="btn btn-outline-danger">Problems</a>
                        <a href="{{url('parties')}}" role="button" class="btn btn-outline-primary">Parties</a>
                    @endif

                </p>
            </article>
        </section>
    </div>

    <div class="sharethis-inline-share-buttons" style="padding-bottom: 10vh"></div>



@endsection

