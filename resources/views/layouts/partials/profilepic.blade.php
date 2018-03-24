
<div class="col-md-3">
    @if(file_exists(public_path().'/upload/'.Auth::User()->uuid.'.png'))
        <img src="{{'upload/'.Auth::User()->uuid.'.png'}}" alt="Profile Pic" class="img-thumbnail" width="200" height="200">
        <br>
    @else
        <img data-name="{{ Auth::User()->name }}" class="demo img-thumbnail" width="200" height="200"/>
        <br>
        {{--<img src="images/profile-pic.png" alt="Profile Pic" class="img-thumbnail" width="150" height="150">--}}
    @endif
    <br>
    <a href="{{url('image-crop')}}" role="button" class="btn btn-outline-primary">Upload a different pic</a>
</div>