@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <br>
                @include('layouts.alerts.errors')
                <br>
                <h2>Edit Opinion</h2>

                <form method="POST" action="{{url('opinions/'.$opinion->id)}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="course">Opinion: maxlength=500</label>
                        <textarea name="matter" id="matter"  maxlength="500" class="form-control" style="height: 50vh;">{{$opinion->matter}}</textarea>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="active" name="active" {{$opinion->active==1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleCheck1">Make active</label>
                    </div>


                    <button type="submit" class="btn btn-outline-info">Update</button>
                </form>

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

            </div>
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