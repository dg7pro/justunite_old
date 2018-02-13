@extends('layouts.app3')

@section('extra-css')

    <style>
        header {
            padding: 154px 0 100px;
        }

        @media (min-width: 992px) {
            header {
                padding: 156px 0 100px;
            }
        }

        section {
            padding: 150px 0;
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
                    <p class="css-tab__label">Groups</p>
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
                    <a href="#contact" role="button" class="btn btn-outline-primary js-scroll-trigger">Know more...</a>
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
                <p>You can't win elections without platform which is only thing we provide to new leaders</p>
                <p>
                    <a href="#" role="button" class="btn btn-outline-warning">Read More..</a>
                   {{-- <a href="#" role="button" class="btn btn-outline-light">Your Constituency</a>--}}
                    <a href="{{url('problems')}}" role="button" class="btn btn-outline-light">All Problems</a>
                </p>
            </article>
        </section>

        <section class="section color3" data-letter="q">
            <article class="section__wrapper">
                <h1 class="section__title">Constituencies</h1>
                <p>543 Lok Sabha Constituency and 4000 Vidhan Sabha Constituency but still India not properly managed</p>
                <p>
                    <a role="button" href="#"  class="btn btn-outline-light">Read More...</a>
                    @if(Auth::guest())
                        <a href="{{url('constituencies')}}" role="button" class="btn btn-outline-dark">All Constituencies</a>
                    @else
                        <a href="{{url('constituencies/'.Auth::User()->constituency_id.'/users')}}" role="button" class="btn btn-outline-dark">Your Constituency</a>
                    @endif
                </p>
            </article>
        </section>
        <section class="section color4" data-letter="e">
            <article class="section__wrapper">
                <h1 class="section__title">Groups</h1>
                <p>Just Unite Foundation is divided into 9 groups each having President, Chairman and Secretary at Constituency and State Levels</p>
                <p>
                    <a role="button" href="#"  class="btn btn-outline-warning">Know More..</a>
                    <a role="button" href="{{url('group/elect-president')}}"  class="btn btn-outline-light">View All</a>
                </p>
            </article>
        </section>
        <section class="section color5" data-letter="p">
            <article class="section__wrapper">
                <h1 class="section__title">States & UT</h1>
                <p>29 States and 7 Union Territories together 36 Administrative Areas</p>
                <p>
                    <a role="button" href="#"  class="btn btn-outline-danger">Read more..</a>
                    @if(Auth::guest())
                        <a role="button" href="{{url('states')}}" class="btn btn-outline-dark">All State</a>
                    @else
                        <a role="button" href="{{url('states/'.Auth::User()->state_id.'/constituencies')}}" class="btn btn-outline-dark">Your State</a>
                    @endif

                </p>
            </article>
        </section>
        <section class="section color6">
            <article class="section__wrapper">
                <h1 class="section__title">Polls</h1>
                <p>Your Opinion is of Utmost Importance for India</p>
                <p>
                    <a href="" role="button" class="btn btn-outline-danger">Polls Page</a>
                    <a href="" role="button" class="btn btn-outline-dark">View Poll</a>
                </p>
            </article>
        </section>
    </div>

    {{--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>--}}


    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>About this page</h2>
                    <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
                    <ul>
                        <li>Clickable nav links that smooth scroll to page sections</li>
                        <li>Responsive behavior when clicking nav links perfect for a one page website</li>
                        <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
                        <li>Minimal custom CSS so you are free to explore your own unique design options</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Services we offer</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Contact us</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
        </div>
        <!-- /.container -->
    </footer>

@endsection



@section('extra-js')
    <!-- Bootstrap core JavaScript -->
    {{--<script src="smoothScroll/jquery.min.js"></script>--}}
    <script src="smoothScroll/bootstrap.bundle.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="smoothScroll/jquery.easing.min.js"></script>

    <script>

        (function($) {
            "use strict"; // Start of use strict

            // Smooth scrolling using jQuery easing
            $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: (target.offset().top - 54)
                        }, 1000, "easeInOutExpo");
                        return false;
                    }
                }
            });

            // Closes responsive menu when a scroll trigger link is clicked
            $('.js-scroll-trigger').click(function() {
                $('.navbar-collapse').collapse('hide');
            });

            // Activate scrollspy to add active class to navbar items on scroll
            $('body').scrollspy({
                target: '#mainNav',
                offset: 54
            });

        })(jQuery); // End of use strict

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
