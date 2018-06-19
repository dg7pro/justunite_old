@extends('layouts.master')

@section('content')

    <div class="container">
        <br>
        @include('layouts.alerts.success')
        @include('layouts.alerts.error')
        <div class="row">
            <div class="col-md-9">
                <br>
                <br>
                <h2>Write your Opinion</h2>

                <form method="POST" action="{{url('faqs/'.$faq->id)}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    {{--Religion--}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="tag">Tags:</label>
                            <select name="tag" id="tag" class="form-control">
                                <option selected value="">Select tag...</option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}" {{ $faq->tag_id == $tag->id ? 'selected="selected"' : '' }}>{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="constituency">Sequence:</label>
                            <select name="sequence" id="sequence" class="form-control">
                                <option selected value="">Select Sequence...</option>
                                @php
                                    $xs = [1,2,3,4,5,6,7];
                                @endphp
                                @foreach($xs as $x)
                                    <option value="{{$x}}" {{ $faq->que_order == $x ? 'selected="selected"' : '' }}>{{$x}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="question">Question:</label>
                        <input type="text" name="question" id="question" class="form-control" value="{{$faq->question}}">
                    </div>


                    <div class="form-group">
                        <label for="answer">Answer: maxlength=500</label>
                        <textarea name="answer" maxlength="500" id="answer" class="form-control" style="height: 40vh;" placeholder="Put your content here...">{{$faq->answer}}</textarea>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="icon">Icon:</label>
                            <input type="text" name="icon" id="icon"  class="form-control" value="{{$faq->icon}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="color">Color:</label>
                            <input type="text" name="color" id="color"  class="form-control" value="{{$faq->color}}">
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-outline-info">Submit</button>
                </form>

                <br>
                <br>


                <br>
                <br>
            </div>
            <br>
            <br>
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