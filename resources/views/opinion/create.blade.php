@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <br>
                <br>
                <h2>Write your Opinion</h2>

                <form method="POST" action="{{url('opinions')}}">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="course">Opinion/Views: maxlength=500</label>
                        <textarea name="matter" maxlength="500" id="matter" class="form-control" style="height: 40vh;" placeholder="Put your content here..."></textarea>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="active" name="active" value={{ 'checked' ? 1 : 0}}>
                        <label class="form-check-label" for="exampleCheck1">Make active</label>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-outline-info">Submit</button>
                </form>

                <br>
                <br>

                {{--<div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Description & Notes:</h4>
                    <p>Each group has different voting power. User can belong to 2 or more groups, their voting power adds up.
                        Like any women can be member of Women Wing as well as ETF her total voting power will be 2+3=5 </p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>--}}

                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">अनुदेश एवं निर्देश:</h4><br>
                    <p>
                        यहाँ आप अपने सामाजिक,राजनीतिक, आर्थिक, धार्मिक एवं व्यक्तिगत विचारो को व्यक्त कर सकते है |
                    </p>
                    <p>
                        आप के विचार आप के प्रोफाइल पेज पर दिखे गए और सभी लोग इसे पड़ सकेगे | हिंदी में अपने विचार व्यक्त करने के लिए पहले हिंदी में टाइप करले फिर यहाँ कॉपी पेस्ट कर दे | आप के विचार हमारे और देश के लिए महत्वपूर्ण है |
                    </p>
                    <hr>
                    <p class="mb-0">
                        धन्यवाद
                        जस्ट यूनाइट !
                    </p>
                </div>

                <br>
                <br>
                <br>
            </div>
            <br>
            <br>
            <div class="col-md-3">
                @include('layouts.partials.dashboard-menu')
            </div>


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