<!doctype html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120452661-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-120452661-1');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{csrf_token()}}">
    @yield('meta-tags')

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.ico') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
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
            height: 80vh;
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
        .color7 {
            background: #40a3d3;
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

    @yield('extra-css')

</head>
<body>

@include('layouts.partials.nav')
@include('layouts.partials.header')
@yield('content')
@include('layouts.partials.footer')



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5ad17dfabc190a0013e2a6dd&product=inline-share-buttons' async='async'></script>
<script type="text/javascript">
    $(document).ready(function () {
        //Disable cut copy paste
        $('body').bind('cut copy paste', function (e) {
            e.preventDefault();
        });

        //Disable mouse right click
        $("body").on("contextmenu",function(e){
            return false;
        });
    });
</script>
@yield('extra-js')
@yield('some-more-js')



</body>
</html>