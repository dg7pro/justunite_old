<div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Track your CONSTITUENCY:</h4>
    <br>
    <form method="POST" action="{{url('constituency/track')}}">
        {{ csrf_field() }}

        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="input-group">
                    <select name="state" id="state" class="form-control" required>
                        <option value="">Select State...</option>
                        @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name2}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="input-group">

                    <select id="constituency" name="constituency" class="form-control" required>
                        <option value="">Select State first...</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
       {{-- <button type="submit" class="btn btn-primary">Go to your Constituency.e</button>--}}

        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="submit" class="btn btn-primary" title="More Information" name="track" id="track-1" value="1">Show</button>
            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="2014 Loksabha Election" name="track" id="track-2" value="2">Result</button>
            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Our Members" name="track" id="track-3" value="3">Apply</button>
        </div>
    </form>
</div>

@section('some-more-js')
    <script>
        onload=function(){
            var s=document.getElementById("state");
            var c=document.getElementById("constituency");
            if(s.value!=null)
                s.value="";
            c.value="";
        }
    </script>
@endsection