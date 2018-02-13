@extends('layouts.app3')

@section('extra-css')

    <style>
        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: rgba(255,255,255,0);
        }
        body {
            line-height: 1.5;
            font-family: "futura-pt", 'Century Gothic', 'Arial', sans-serif;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            /*color: #fff;*/
            /*background: #1a1a1a;*/
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .css-tab {
            will-change: transform;
            /*position: fixed;*/
            top: 56px;
            left: 0;
            width: 100%;
            z-index: 1;
            background: #1a1a1a;
            -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
            -webkit-transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .css-tab--active {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
        .css-tab__list {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }
        .css-tab__item {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            position: relative;
            -webkit-transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .css-tab__item:hover {
            opacity: 0.75;
        }
        .css-tab__thumb {
            display: block;
            height: 80px;
            background: #dc143c;
            -webkit-transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .css-tab__thumb:before {
            content: attr(data-letter);
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            font-size: 70px;
            text-transform: uppercase;
            opacity: 0;
        }
        .css-tab__label {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #e6e6e6;
            margin: 0;
        }
        @media (max-width: 850px) {
            .css-tab__label {
                font-size: 14px;
            }
        }
        @media (max-width: 720px) {
            .css-tab__label {
                display: none;
            }
            .css-tab__thumb {
                height: 60px;
            }
            .css-tab__thumb:before {
                font-size: 24px;
                opacity: 0.7;
            }
        }
        .tab-content {
            height: 100vh;
            will-change: transform;
            -webkit-perspective: 400px;
            perspective: 400px;
            overflow: hidden;
            -webkit-transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .section {
            will-change: transform;
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            height: 100vh;
            overflow: hidden;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            background: #fff;
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
            -webkit-transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .section--hidden {
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
        }
        .section--active {
            -webkit-transform: translateX(0) rotateY(0);
            transform: translateX(0) rotateY(0);
            z-index: 2;
        }
        .section__wrapper {
            width: 100%;
            max-width: 800px;
            padding: 0 8vw;
            position: relative;
        }
        .section__title {
            margin: 0 0 25px 0;
            font-size: 48px;
            font-weight: normal;
            text-transform: uppercase;
            letter-spacing: 5px;
        }
        .section__title:before {
            content: '';
            position: absolute;
            top: 5rem;
            left: 45%;
            margin: auto;
            width: 10%;
            height: 2px;
            background: #fff;
        }
        @media (max-width: 720px) {
            .section__title {
                font-size: 28px;
            }
            .section__title:before {
                top: 3.25rem;
            }
        }
        .section p {
            margin: 0 0 25px 0;
            font-family: 'Georgia';
            font-size: 18px;
            color: #fff;
            opacity: 0.55;
        }
        @media (max-width: 720px) {
            .section p {
                font-size: 16px;
            }
        }
        .section p:last-child {
            margin-bottom: 0;
        }
        .color1 {
            background: #1b1f25;
        }
        .color2 {
            background: #e74c3c;
        }
        .color3 {
            background: #3498db;
        }
        .color4 {
            background: #9b59b6;
        }
        .color5 {
            background: #1bc885;
        }
        .color6 {
            background: #dfb816;
        }
        .logo {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 2;
        }
        @media (max-width: 720px) {
            .logo {
                top: 110px;
                right: 50%;
                margin-right: -20px;
            }
        }
        .logo img {
            width: 45px;
            -webkit-transform: rotate(0);
            transform: rotate(0);
            -webkit-transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .logo img:hover {
            -webkit-transform: rotate(180deg) scale(1.1);
            transform: rotate(180deg) scale(1.1);
        }


    </style>

@endsection

@section('content')

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="#">Just Unite</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0 mr-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav">
                {{--<li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>

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
                    <p class="css-tab__label">CSS</p>
                </a>
            </li>
            <li class="css-tab__item">
                <a href="" class="css-tab__link">
                    <div class="css-tab__thumb color3" data-letter="J"></div>
                    <p class="css-tab__label">jQuery</p>
                </a>
            </li>
            <li class="css-tab__item">
                <a href="" class="css-tab__link">
                    <div class="css-tab__thumb color4" data-letter="H"></div>
                    <p class="css-tab__label">HTML</p>
                </a>
            </li>
            <li class="css-tab__item">
                <a href="" class="css-tab__link">
                    <div class="css-tab__thumb color5" data-letter="B"></div>
                    <p class="css-tab__label">Bootstrap</p>
                </a>
            </li>
            <li class="css-tab__item">
                <a href="" class="css-tab__link">
                    <div class="css-tab__thumb color6" data-letter="P"></div>
                    <p class="css-tab__label">Python</p>
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
                <h1 class="section__title" style="color: #989A9D">Home</h1>
                <p>The Home of web technology tutorials, tips and tricks</p>
                <p>
                    <button type="button" class="btn btn-outline-primary">Know more...</button>

                    <button type="button" class="btn btn-outline-danger">Register</button>

                </p>
            </article>
        </section>
        <section class="section color2" data-letter="p">
            <article class="section__wrapper">
                <h1 class="section__title">CSS</h1>
                <p>Style your website by CSS</p>
            </article>
        </section>
        <section class="section color3" data-letter="q">
            <article class="section__wrapper">
                <h1 class="section__title">jQuery</h1>
                <p>A powerful and popular Java Script library</p>
            </article>
        </section>
        <section class="section color4" data-letter="e">
            <article class="section__wrapper">
                <h1 class="section__title">HTML</h1>
                <p>The web language: Hypertext Markup Language</p>
            </article>
        </section>
        <section class="section color5" data-letter="s">
            <article class="section__wrapper">
                <h1 class="section__title">Bootstrap</h1>
                <p>A mobile first web framework</p>
            </article>
        </section>
        <section class="section color6">
            <article class="section__wrapper">
                <h1 class="section__title">Python</h1>
                <p>High level popular programming language</p>
            </article>
        </section>
    </div>



    {{--<div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Big Test</h1>
                    <h2>Little Test</h2>
                </div>
                <div class="col-md-4">
                    <img class="img-thumbnail img-responsive" src="images/uttar-pradesh.png" />
                </div>
            </div>
        </div>
    </div>--}}
@endsection


@section('extra-js')

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