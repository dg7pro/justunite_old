@extends('layouts.master-i')

@section('meta-tags')

    <meta property="fb:app_id" content="131336294384114" />

@endsection

@section('extra-css')
    <link href="{{asset('css/tipso.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

@endsection

@section('content')
    @include('layouts.partials.fb-comment')

    {{--<div class="jumbotron color4">
        <div class="container">
            <h2 class="display-4">Just Unite</h2>
            <h2 class="display-4">जस्ट यूनाइट</h2>

        </div>
    </div>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <br><br>
                <div class="alert alert-secondary" role="alert">
                    <h3 class="alert-heading">
                        {{'List all Great Indians Ever'}}
                        <a href="#english" role="button" class="btn btn-outline-secondary js-scroll-trigger">Read in English</a>
                    </h3>
                </div>
                <br>
                {{--<div style="height: 75vh; width: 100%; overflow: auto">--}}
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-md-4">
                                <h4>{{$category->name}}</h4>
                                <ul>
                                    @foreach($category->indians as $indian)
                                        @if(Auth::guest())
                                            <li class="d-inline text-primary">
                                                <a href="{{url('indians/'.$indian->id)}}" class="tipso" data-tipso="{{$indian->suggested_by}}">{{$indian->name}}</a>
                                            </li>
                                        @else
                                            <li class="d-inline text-primary">
                                                <a href="{{url('indians/'.$indian->id)}}" class="tipso" data-tipso="{{$indian->suggested_by}}">{{$indian->name}}</a>
                                            </li>
                                            {{' ~ '}}
                                            @if(in_array($indian->id,$likedIds))
                                                <form class="d-inline">
                                                    <i class="fa fa-check-square-o" style="font-size: 20px; color: crimson"></i>
                                                    <a href="#" data-id="{{$indian->id}}" class="ajaxUnLike text-light" id="ajaxUnLike">UnLike</a>
                                                </form>
                                            @else
                                                <form class="d-inline">
                                                    <a href="#" data-id="{{$indian->id}}" class="ajaxLike" id="ajaxLike">Like</a>
                                                </form>
                                            @endif
                                        @endif
                                        <br>
                                    @endforeach
                                </ul>
                                <br>
                            </div>
                        @endforeach
                        {{--<div class="col-md-4">
                            <ul>
                                <li>Phasellus iaculis neque</li>
                                <li>Purus sodales ultricies</li>
                                <li>Vestibulum laoreet porttitor sem</li>
                                <li>Ac tristique libero volutpat at</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li>Phasellus iaculis neque</li>
                                <li>Purus sodales ultricies</li>
                                <li>Vestibulum laoreet porttitor sem</li>
                                <li>Ac tristique libero volutpat at</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li>Phasellus iaculis neque</li>
                                <li>Purus sodales ultricies</li>
                                <li>Vestibulum laoreet porttitor sem</li>
                                <li>Ac tristique libero volutpat at</li>
                            </ul>
                        </div>--}}
                    </div>
                {{--</div>--}}
                <br>
                <br>

                <div class="sharethis-inline-share-buttons"></div>
                <br>
                <br>
                <hr>
                <div class="fb-comments" data-href="http://www.justunite.org/problems/indians" data-width="100%" data-numposts="5"></div>

            </div>

            {{--<div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>--}}
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('js/tipso.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <script type="text/javascript">

        // Tipso Tooltip
        $('.tipso').tipso({
            position: 'top-right',
            background: 'rgba(0,0,0,0.8)',
            titleBackground: 'tomato',
            titleContent: 'Suggested By:',
            useTitle: false,
            tooltipHover: true

        });

        // Default Bootstrap tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

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
        jQuery(document).ready(function(){
            jQuery('.ajaxLike').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    url: "{{ url('/like-indian') }}",
                    method: 'post',
                    data: {
                        alphaid: $(this).data('id')
                    },
                    /*success: function(result){
                        console.log(result);
                    }*/

                    success: function(result){
                        jQuery('#likeCount').text(result.kbc);
                        jQuery("[data-id='"+result.id+"']").replaceWith('<img src="{{asset('images/loader1.gif')}}" height="20px" width="20px" class="align-centre">');

                        if(result.safalta == true){ // if true (1)
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 2000);
                        }

                        $.confirm({
                            title: 'Just Unite!',
                            content: result.message,
                            type: result.color,
                            buttons: {
                                omg: {
                                    text: 'Thank you!',
                                    btnClass: 'btn-'+result.color,
                                },
                                close: function () {
                                }
                            }
                        });

                    }

                });
            });
        });
    </script>

    <script>
        jQuery(document).ready(function(){
            jQuery('.ajaxUnLike').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    beforeSend: function(){
                        if(confirm("Are you sure you want to unlike ?"))
                            return true;
                        else
                            return false;
                    },

                    url: "{{ url('/unlike-indian') }}",
                    method: 'post',
                    data: {
                        alphaid: $(this).data('id')
                    },
                    /*success: function(result){
                        console.log(result);
                    }*/
                    success: function(result){

                        jQuery("[data-id='"+result.id+"']").replaceWith('<img src="{{asset('images/loader1.gif')}}" height="20px" width="20px" class="align-centre">');

                        if(result.safalta == true){ // if true (1)
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 2000);
                        }

                        $.confirm({
                            title: 'Just Unite!',
                            content: result.message,
                            type: result.color,
                            buttons: {
                                omg: {
                                    text: 'Thank you!',
                                    btnClass: 'btn-'+result.color,
                                },
                                close: function () {
                                }
                            }
                        });

                    }
                });
            });
        });
    </script>


@endsection
