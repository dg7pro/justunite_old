@extends('layouts.master')

@section('content')

    <div class="jumbotron color4">
        <div class="container">
            <h2 class="display-3">Just Unite</h2>
            <h2 class="display-3">जस्ट यूनाइट</h2>

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

                {{--<div class="alert alert-secondary" role="alert">
                    <h4 class="alert-heading">निवेदन:</h4>
                    <p>राष्ट्रीय आम बैठक 15 अगस्त 2018 के लगभग आयोजित की जाएगी
                        इस बैठक में इन मुदद्दो पे चर्चा होगी
                        <br>
                        1. सभी समस्याएं जीसका देश अभी सामना कर रही हैं,<br>
                        2. तीसरे मोर्चे के गठन की संभावना<br>
                        3. 2019 आम चुनाव के लिए एजेंडा<br>
                    </p>
                    <p>
                        मैं आप सभी को इस चर्चा में सम्लित होने और अपने मूल्यवान सुझाव देने का अनुरोध करता हूं
                        बैठक में भाग लेने के लिए भागीदारी शुल्क रुपये 2000/ - है।
                        तिथि और स्थान जल्द ही सूचित किया जाएगा।
                        अधिक जानकारी के लिए कृपया संपर्क करें - 8887610230
                    </p>
                    <hr>
                    <p>
                        श्री धनंजय गुप्ता
                        ~आयोजन सचिव
                        (जस्ट यूनाइट)
                    </p>
                </div>--}}

                <hr>

                <div id="{{$engContent->slug}}">

                    <div class="alert alert-info" role="alert">
                        <h3 class="alert-heading">
                            {{$engContent->title}}
                            <a href="#hindi" role="button" class="btn btn-outline-info js-scroll-trigger">Read in Hindi</a>
                        </h3>
                    </div>

                    <img src="{{asset('images/abraham-lincoln.jpg')}}"><br><br>
                    {!! $engContent->matter !!}
                </div>


                {{--<div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Request:</h4>
                    <p>
                        National General Meeting will be held around 15th August 2018, to discuss:
                        <br>
                           1.	All the problems which country is facing right now<br>
                           2.	Possibility of formation of 3rd front<br>
                           3.	Agenda for 2019 General Election<br>
                    </p>
                    <p>
                        I request all of you to participate in this face to face discussion and give your valuable suggestions
                        A participation fee to attend the meeting is Rs. 2000/- Date and Venue will be informed soon.
                        For more information please contact – 8887610230
                    </p>
                    <hr>
                    <p>
                        Er. Dhananjay Gupta
                        ~ Organizing Secretary
                        (Just Unite)
                    </p>
                </div>--}}
                <br>
                <br>


              {{--  <h2>
                    2019 लोकसभा चुनाव/Loksabha Election
                    <a href="#english" role="button" class="btn btn-outline-primary js-scroll-trigger">Read in English</a>
                </h2>
                @foreach($contents as $content)
                    <div id="{{$content->slug}}">
                        <img src="{{asset('images/abraham-lincoln.jpg')}}"><br><br>
                        {!! $content->matter !!}
                        <hr>
                    </div>
                @endforeach--}}
                {{--<div id="hindi">
                    <h3>प्रस्तावना:</h3>
                    <img src="{{asset('images/abraham-lincoln.jpg')}}"><br><br>
                    <p>
                        अमेरिका के राष्ट्रीय पति अब्राहम लिंकन ने एक बार कहा था - "यूनाइटेड वी स्टैंड, डिवाइडेड वी फॉल" - इसका एअर्थ होता है - अगर हम एक है थो मुकाबला कर सकते है वार्ना अलग अलग हुवे तो हम बिखर जाये गए, हमारा आस्तित्वा ही नहीं रहेगा।
                        ये उस समाये की बात है जब अमेरिका गृह युद्ध से गुजर रहा था ।  आज भले ही भारत में गृह युद्ध न हो परन्तु इस्थिति गंभीर है । आज़ादी के ७२ साल और १५ प्राइम मिनिस्टर - फिर भी देश की किसी भी समस्या का पूणतह समाधान नहीं हो पाया ।
                        वर्त्तमान में हिंदुस्तान की जनता उसी प्रकार जूझ रही है - जैसे आजादी के पहले जूझ रही थी - असिक्छा, गरीबी, बेरोजगारी, जातिवाद अपने चरम सीमा पैर है।
                    </p>
                    <h3>हमारा लक्ष्य:</h3>
                    <p>
                        आज़ादी से पहले लोगो ने क्या सपना देखा था क्या उम्मीद की थी - की सायद देश की आज़ादी के साथ साथ उनको अपनी, समाज की और देश की सारि समस्याओ से भी आज़ादी मिलेगी - लोगो की इसी ऊमीद से जन्मा है- ( जे. यू. )
                        जस्ट यूनाइट कोई राजनितिक party नहीं है, न तो ये  कोई संगठन है - ( जे. यू. ) एक सोच है जिसका मकसद है देश में प्रजातंत्र की रक्चा करते हुवे देश की सारि समस्या का समाधान ढूंढ़ना ।
                        इसके लिए ( जे. यू. ) राष्ट्रीय ईस्टर पर सभी छोटी पार्टियों एवं निर्दलयी देश भक्तो को एकत्रित कर रही है ।
                    </p>
                    --}}{{--<p>
                        <img src="{{asset('images/.jpg')}}"><br><br>
                    </p>
--}}{{--
                </div>
                <hr>
                <div id="english">
                    <h3>Introduction:</h3>
                    <img src="{{asset('images/abraham-lincoln.jpg')}}"><br><br>
                    <p>
                        Once the president of United States Abraham Lincoln had said – “United we Stand & Divided we Fall”.
                        What he meant is that- if American peoples are united they can face any challenge coming on America,
                        and if fallen apart they will lose their influence and power. This was the time when Americans were
                        under brutal civil war. Today United States is most powerful nation of world. Though at present
                        Indians are not going through any civil war or chaos but the situation is highly critical. After
                        72 years of Independence and having seen 16 General Elections, not a single problem of India got
                        solved. The Indians are still suffering the same way, as they were before the Independence.
                        Illiteracy, poverty, unemployment, casteism etc. are still on the peak.
                    </p>
                    <p>
                        What the people thought and imagined before Independence, that with independence, they will also
                        gain freedom from all their problems, this expectations and dreams of Indians has given birth to
                        Just Unite (JU).  Just unite is not a political party, nor it is an organization. JU is an aspiration,
                        which aims to find satisfactory and final solution of all our problems, protecting democracy and
                        interests of Indians. For this we are uniting small parties and Individual candidates who are true
                        patriots from every corner of India
                    </p>



                </div>
--}}


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
