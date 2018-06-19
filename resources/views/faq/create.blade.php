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

                <form method="POST" action="{{url('faqs')}}">
                    {{ csrf_field() }}

                    {{--Religion--}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="tag">Tags:</label>
                            <select name="tag" id="tag" class="form-control">
                                <option selected value="">Select tag...</option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="constituency">Sequence:</label>
                            <select name="sequence" id="sequence" class="form-control">
                                <option selected value="">Select Sequence...</option>
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="question">Question:</label>
                        <input type="text" name="question" id="question"  class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="answer">Answer: maxlength=500</label>
                        <textarea name="answer" maxlength="500" id="answer" class="form-control" style="height: 40vh;" placeholder="Put your content here..."></textarea>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="icon">Icon:</label>
                            <input type="text" name="icon" id="icon"  class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="color">Color:</label>
                            <input type="text" name="color" id="color"  class="form-control">
                        </div>
                    </div>



                    {{--<div class="form-check">
                        <input type="checkbox" class="form-check-input" id="active" name="active" value={{ 'checked' ? 1 : 0}}>
                        <label class="form-check-label" for="exampleCheck1">Make active</label>
                    </div>--}}
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