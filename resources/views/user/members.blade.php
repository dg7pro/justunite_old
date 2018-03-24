@extends('layouts.master')

@section('content')


    <div class="tab-content">
        <section class="section section--active color1" data-letter="a">
            <article class="section__wrapper">
                <h1 class="section__title" style="color: #989A9D">Members</h1>
                <br>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p>
                    <a href="#one" role="button" class="btn btn-outline-primary js-scroll-trigger">Know more...</a>
                    @if(Auth::guest())
                        <a href="{{url('register')}}" role="button" class="btn btn-outline-danger">Register</a>
                    @else
                        <a href="{{url('home')}}" role="button" class="btn btn-outline-danger">Dashboard</a>
                    @endif

                </p>
            </article>
        </section>

    </div>



@endsection


