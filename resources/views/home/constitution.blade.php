@extends('layouts.master')

@section('content')

    <div class="jumbotron color4">
        <div class="container">
            <h2 class="display-4">J.U.-Constitution</h2>
            <h2 class="display-4">जे.यू.-संविधान</h2>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">

                <div id="{{$hiContent->slug}}">

                    <div class="alert alert-secondary" role="alert">
                        <h3 class="alert-heading">
                            {{$hiContent->title}}
                            <a href="#english" role="button" class="btn btn-outline-secondary js-scroll-trigger">Read in English</a>
                        </h3>
                    </div>

                    <img src="{{asset('images/abraham-lincoln.jpg')}}"><br><br>
                    {!! $hiContent->matter !!}
                </div>

                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">निवेदन:</h4>
                    <p>राष्ट्रीय आम बैठक 15 अगस्त 2018 के लगभग आयोजित की जाएगी
                        इस बैठक में इन मुदद्दो पे चर्चा होगी
                        <br>
                        1. सभी समस्याएं जीसका देश अभी सामना कर रही हैं,<br>
                        2. तीसरे मोर्चे के गठन की संभावना<br>
                        3. 2019 आम चुनाव के लिए एजेंडा<br>
                    </p>
                    <p>
                        प्रत्येक लोकसभा सीट से एक उम्मीदवार - यानिकि 543 उम्मीदवारों का चयन, सदस्यों के बीच सेहि उनकी योग्यता और सक्षमता के अनुसार किया जाएगा।
                        हम आप सभी को इस चर्चा में सम्लित होने और अपने मूल्यवान सुझाव देने का अनुरोध करते हैं।<br>
                        अधिक जानकारी के लिए कृपया संपर्क/व्हाट्सप्प करें - 8887610230
                    </p>
                    <!-- <p>
                        मैं आप सभी को इस चर्चा में सम्लित होने और अपने मूल्यवान सुझाव देने का अनुरोध करता हूं
                        बैठक में भाग लेने के लिए भागीदारी शुल्क रुपये 2000/ - है।
                        तिथि और स्थान जल्द ही सूचित किया जाएगा।
                        अधिक जानकारी के लिए कृपया संपर्क/व्हाट्सप्प करें - 8887610230
                    </p> -->
                    <hr>
                    <p>
                        श्री धनंजय
                        ~आयोजन सचिव
                        (जस्ट यूनाइट)
                        <a href="{{url('/')}}" role="button" class="btn btn-outline-success" >अधिक जानिए</a>
                    </p>
                </div>

                <hr>

                <div id="{{$engContent->slug}}">

                    <div class="alert alert-secondary" role="alert">
                        <h3 class="alert-heading">
                            {{$engContent->title}}
                            <a href="#hindi" role="button" class="btn btn-outline-info js-scroll-trigger">Read in Hindi</a>
                        </h3>
                    </div>

                    <img src="{{asset('images/abraham-lincoln.jpg')}}"><br><br>
                    {!! $engContent->matter !!}
                </div>


                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Request:</h4>
                    <p>
                        National General Meeting will be held around 15th August 2018, to discuss:
                        <br>
                        1.	All the problems which country is facing right now<br>
                        2.	Possibility of formation of 3rd front<br>
                        3.	Agenda for 2019 General Election<br>
                    </p>
                    <p>
                        Final selection of 543 candidates (1 candidate from each loksabha seat) will be made from among the
                        members, according to their ability and capability to fight 2019 Loksabha Election.<br>
                        We request all of you to participate in this discussion and give your valuable suggestions.<br>
                        For more information please contact/whatsapp – 8887610230
                    </p>
                    <!--  <p>
                         I request all of you to participate in this face to face discussion and give your valuable suggestions
                         A participation fee to attend the meeting is Rs. 2000/- Date and Venue will be informed soon.
                         For more information please contact/whatsapp – 8887610230
                     </p> -->
                    <hr>
                    <p>
                        Mr. Dhananjay
                        ~ Organizing Secretary
                        (Just Unite)
                        <a href="{{url('/')}}" role="button" class="btn btn-outline-success" >Know more</a>
                    </p>
                </div>
                <br>
                <br>

            </div>

            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
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

@endsection
