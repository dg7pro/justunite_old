@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <br>
                @include('layouts.alerts.error')
                <br>
                <h2>Advertise Yourself</h2>

                <form method="POST" action="{{url('adds')}}">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="course">Opinion/Views: maxlength=500</label>
                        <textarea name="matter" maxlength="500" id="matter" class="form-control" style="height: 50vh;" placeholder="Put your add here..."></textarea>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="active" name="active" value=1>
                        <label class="form-check-label" for="exampleCheck1">Make active</label>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-outline-info">Submit</button>
                    <a href="{{ url()->previous() }}" role="button"  class="btn btn-outline-danger">Cancel</a>
                </form>

                <br>
                <br>

                @include('layouts.partials.add-instruction')
                <br>

                {{--Add Examples--}}
                <div>
                    <h4 class="text-primary">Example/उदाहरण:</h4>

                    <div class="alert alert-secondary" role="alert">
                        <h4 class="alert-heading">All Sorts of Criminal Cases</h4>
                        <br>
                        <p><b>Senior criminal lawyer, having practice experience of more than 15 years.
                                You can contact me for all sorts of Criminal cases, Family Dispute, Juvenile, Divorce,
                                Medical Negligence, Marriage, Bail, Arbitration, Motor vehicle act.</b></p>
                        <hr>
                        <p class="mb-0"><b>Email: <i>Your Email</i> | Contact: <i>Mobile No.</i> | Location: <i>Your workplace</i> </b></p>
                    </div>

                    <div class="alert alert-secondary" role="alert">
                        <h4 class="alert-heading">Web Design and Development</h4>
                        <br>
                        <p><b>I’m extremely passionate about web development and design in all its forms and helping
                                small businesses and artisans build and improve their online presence. I design beautiful
                                User Interfaces for web and mobile which are responsive & retina ready.</b></p>
                        <hr>
                        <p class="mb-0"><b>Email: <i>Your Email</i> | Contact: <i>Mobile No.</i> | Location: <i>Your workplace</i> </b></p>
                    </div>

                    <div class="alert alert-secondary" role="alert">
                        <h4 class="alert-heading">Service and Repairing of AC, Water Purifier, Fridge etc</h4>
                        <br>
                        <p><b>एयर कंडीशनर, वाटर फ़िल्टर, वाटर पूरिफिएर, फ्रिज इत्यादि के इंस्टालेशन, सर्विस या रिपेयरिंग के लिए नीचे दिए गए नंबर पर संपर्क करे| दन्यवाद |</b></p>
                        <hr>
                        <p class="mb-0"><b>Email: <i>Your Email</i> | Contact: <i>Mobile No.</i> | Location: <i>Your workplace</i> </b></p>
                    </div>
                </div>

                {{-- Add Examples End--}}
                <br>
            </div>
            @include('layouts.partials.dashboard-menu')
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="{{asset('js/jquery.maxlength.min.js')}}"></script>
    <script>
        $("#matter").maxlength();
        //CKEDITOR.replace( 'matter');


    </script>
@endsection