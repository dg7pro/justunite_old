@extends('layouts.app3')

@section('extra-css')



    {{--<style>
        body {
            font: 14px/2 Georgia, serif;
        }

        #page-wrap {
            max-width: 500px;
            margin: 1rem auto;
            padding: 1rem;
        }

        h1, h2 {
            line-height: 1.2;
        }

        p, ul, h1 {
            margin: 0 0 1rem 0;
        }
    </style>--}}

    <style>
        #page-wrap{
            max-width: 80%;
            margin: 1rem auto;
            padding: 1rem;
        }
    </style>

@endsection

@section('content')

    <nav class="css-tab css-tab--active">
        <ul class="css-tab__list">
            <li class="css-tab__item">
                <a href="" class="css-tab__link">
                    <div class="css-tab__thumb color1" data-letter="H"></div>
                    <p class="css-tab__label">Home</p>
                </a>
            </li>
            <li class="css-tab__item">
                <a href="" class="css-tab__link">
                    <div class="css-tab__thumb color2" data-letter="C"></div>
                    <p class="css-tab__label">Problems</p>
                </a>
            </li>
            <li class="css-tab__item">
                <a href="" class="css-tab__link">
                    <div class="css-tab__thumb color3" data-letter="J"></div>
                    <p class="css-tab__label">Constituency</p>
                </a>
            </li>
            <li class="css-tab__item">
                <a href="" class="css-tab__link">
                    <div class="css-tab__thumb color4" data-letter="H"></div>
                    <p class="css-tab__label">Parties</p>
                </a>
            </li>
            <li class="css-tab__item">
                <a href="" class="css-tab__link">
                    <div class="css-tab__thumb color5" data-letter="B"></div>
                    <p class="css-tab__label">States</p>
                </a>
            </li>
            <li class="css-tab__item">
                <a href="" class="css-tab__link">
                    <div class="css-tab__thumb color6" data-letter="P"></div>
                    <p class="css-tab__label">Polls</p>
                </a>
            </li>
        </ul>
        <a href="https://www.jquery-az.com" class="logo" target="_blank">
            <img class="logo" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/ettrics-logo.svg" alt="" />
        </a>
    </nav>

    <div class="tab-content">
        <section class="section section--active color1" data-letter="a">
            <article class="section__wrapper">
                <h1 class="section__title" style="color: #989A9D">Just Unite</h1>
                <p>Beginning the Era of New Leadership</p>
                <p>
                    <a href="#top" role="button" class="btn btn-outline-primary js-scroll-trigger">Know more...</a>
                    @if(Auth::guest())
                        <a href="{{url('register')}}" role="button" class="btn btn-outline-danger">Register</a>
                    @else
                        <a href="{{url('home')}}" role="button" class="btn btn-outline-danger">Dashboard</a>
                    @endif

                </p>
            </article>
        </section>
        <section class="section color2" data-letter="s">
            <article class="section__wrapper">
                <h1 class="section__title">Problems</h1>
                <p>70 years, 543 parliament members, 1048 legislative assembly members and more than 1000 Political Parties,
                    but still unable to solve 27 problems. Hope this time we chose Prime minister who can solve all these problems</p>
                <p>
                    {{--<a href="#two" role="button" class="btn btn-outline-warning">Read More..</a>--}}
                   {{-- <a href="#" role="button" class="btn btn-outline-light">Your Constituency</a>--}}
                    <a href="{{url('problems')}}" role="button" class="btn btn-outline-light">Problems / समस्याएं</a>
                </p>
            </article>
        </section>

        <section class="section color3" data-letter="q">
            <article class="section__wrapper">
                <h1 class="section__title">Constituencies</h1>
                <p>543 Lok Sabha Constituency and 4000 Vidhan Sabha Constituency but still India not properly managed</p>
                <p>
                   {{-- <a role="button" href="#three"  class="btn btn-outline-light">Read More...</a>--}}
                    @if(Auth::guest())
                        <a href="{{url('constituencies')}}" role="button" class="btn btn-outline-dark">Constituencies/लोकसभा क्षेत्र </a>
                    @else
                        <a href="{{url('constituencies/your-constituency')}}" role="button" class="btn btn-outline-dark">Your Constituency/आपका क्षेत्र</a>
                    @endif
                </p>
            </article>
        </section>
        <section class="section color4" data-letter="e">
            <article class="section__wrapper">
                <h1 class="section__title">Parties</h1>
                {{--<p>Just Unite Foundation is divided into 9 groups each having President, Chairman and Secretary at Constituency and State Levels</p>--}}
                <p>India being the multi-party democratic system, is currently having around 1800 registered political parties</p>
                <p>
                    {{--<a role="button" href="#four"  class="btn btn-outline-warning">Know More..</a>
                    <a role="button" href="{{url('parties')}}"  class="btn btn-outline-light">View All</a>--}}
                    <a role="button" href="{{url('parties')}}"  class="btn btn-outline-light">Parties/राजनीतिक दल</a>
                </p>
            </article>
        </section>
        <section class="section color5" data-letter="p">
            <article class="section__wrapper">
                <h1 class="section__title">States & UT</h1>
                <p style="color: #000000">29 States and 7 Union Territories together 36 Administrative Areas</p>
                <p>
                    {{--<a role="button" href="#five"  class="btn btn-outline-danger">Read more..</a>--}}
                    @if(Auth::guest())
                        <a role="button" href="{{url('states')}}" class="btn btn-outline-dark">States/प्रदेश</a>
                    @else
                        <a role="button" href="{{url('states/'.Auth::User()->state_id.'/constituencies')}}" class="btn btn-outline-dark">Your State/आपका राज्य</a>
                    @endif

                </p>
            </article>
        </section>
        <section class="section color6">
            <article class="section__wrapper">
                <h1 class="section__title">Polls</h1>
                <p style="color: #000000">Your Opinion is of Utmost Importance for India</p>
                <p>
                    {{--<a href="#six" role="button" class="btn btn-outline-danger">Polls Page</a>--}}
                    <a href="{{url('polls')}}" role="button" class="btn btn-outline-dark">Opinion Poll/ जनमत</a>
                </p>
            </article>
        </section>
    </div>

    <div id="page-wrap">

        <h1 id="top" align="center">Just Unite</h1>

        {{--<ul>
            <li><a href="#two">Scroll to Section Two</a></li>
            <li><a href="#three">Scroll to Section Three</a></li>
        </ul>--}}

        @foreach($contents as $content)

            <h3 id="{{$content->slug}}">{{$content->title}}</h3>
            <p><a href="#top">Top</a></p>

            {!! $content->matter !!}

            <p align="center">
                <a href="{{$whatsapp}}" role="button" class="btn btn-outline-success" ><i class="fa fa-whatsapp"> Join Whatsapp</i> </a>
                <a href="{{url('register')}}" role="button" class="btn btn-outline-primary" >Be Member &raquo;</a>
            </p>


        @endforeach

    </div>
@endsection

@section('extra-js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        // Select all links with hashes
        $('a[href*="#"]')
        // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });

    </script>


    <script>
        var Nav = (function() {

            var
                nav 		= $('.css-tab'),
                section = $('.section'),
                link		= nav.find('.css-tab__link'),
                navH		= nav.innerHeight(),
                isOpen 	= true,
                hasT 		= false;

            var toggleNav = function() {
                nav.toggleClass('css-tab--active');
                shiftPage();
            };


            var switchPage = function(e) {
                var self = $(this);
                var i = self.parents('.css-tab__item').index();
                var s = section.eq(i);
                var a = $('section.section--active');
                var t = $(e.target);

                if (!hasT) {
                    if (i == a.index()) {
                        return false;
                    }
                    a
                        .addClass('section--hidden')
                        .removeClass('section--active');

                    s.addClass('section--active');

                    hasT = true;

                    a.on('transitionend webkitTransitionend', function() {
                        $(this).removeClass('section--hidden');
                        hasT = false;
                        a.off('transitionend webkitTransitionend');
                    });
                }

                return false;
            };

            var keyNav = function(e) {
                var a = $('section.section--active');
                var aNext = a.next();
                var aPrev = a.prev();
                var i = a.index();


                if (!hasT) {
                    if (e.keyCode === 37) {

                        if (aPrev.length === 0) {
                            aPrev = section.last();
                        }

                        hasT = true;

                        aPrev.addClass('section--active');
                        a
                            .addClass('section--hidden')
                            .removeClass('section--active');

                        a.on('transitionend webkitTransitionend', function() {
                            a.removeClass('section--hidden');
                            hasT = false;
                            a.off('transitionend webkitTransitionend');
                        });

                    } else if (e.keyCode === 39) {

                        if (aNext.length === 0) {
                            aNext = section.eq(0)
                        }


                        aNext.addClass('section--active');
                        a
                            .addClass('section--hidden')
                            .removeClass('section--active');

                        hasT = true;

                        aNext.on('transitionend webkitTransitionend', function() {
                            a.removeClass('section--hidden');
                            hasT = false;
                            aNext.off('transitionend webkitTransitionend');
                        });

                    } else {
                        return
                    }
                }
            };

            var bindActions = function() {
                link.on('click', switchPage);
                $(document).on('ready', function() {
                    page.css({
                        'transform': 'translateY(' + navH + 'px)',
                        '-webkit-transform': 'translateY(' + navH + 'px)'
                    });
                });
                $('body').on('keydown', keyNav);
            };

            var init = function() {
                bindActions();
            };

            return {
                init: init
            };

        }());

        Nav.init();
    </script>

@endsection
