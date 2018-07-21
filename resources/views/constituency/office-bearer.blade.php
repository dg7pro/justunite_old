@extends('layouts.master')

@section('content')
    <div class="container">
        <br><br>
        @include('layouts.alerts.success')
        @include('layouts.alerts.error')
        <div class="row">
            <div class="col-md-9">

                <h2>Constituency : <a href="{{url('constituencies/'.$constituency->id)}}">{{$constituency->pc_name}}</a> </h2>
                {{--<p>आप आवेदन कर सकते हैं, अंतिम चयन अक्टूबर 2018 में किया जाएगा, अधिक जानकारी के लिए कृपया संपर्क करें - 8887610230</p>
                <p>You can apply, final selection will be made in October 2018, for more information please contact - 8887610230</p>--}}
                <hr>
                <br>
                <h4 class="text-primary">We need members:</h4>
                <ul class="list-group">
                    @foreach($constituency->vacant as $office)
                        {{--<li class="list-group-item">{{$office->name. ' : '}}
                            @if($office->pivot->user_id == null or $office->pivot->active == 0)
                                <a href="{{url('offices/'.$office->id.'/apply-for')}}" role="button" class="btn btn-sm btn-outline-success">Apply</a>
                            @else
                                <a href="{{url('users/'.$office->pivot->user_id)}}" class="text-primary">{{ $office->pivot->user_name. ' (In office)'}}</a>{{' (In office)'}}
                            @endif
                        </li>--}}

                        <li class="list-group-item">{{$office->name. ' : '}}
                            <a href="{{url('offices/'.$office->id.'/apply-for')}}" role="button" class="btn btn-sm btn-outline-success">Apply</a>
                        </li>
                    @endforeach
                </ul>

                <br><br>
                @if(!$constituency->filled ->isEmpty())
                    <h4 class="text-primary">Office Bearer:</h4>
                    <ul class="list-group">
                        @foreach($constituency->filled as $office)
                            {{--<li class="list-group-item">{{$office->name. ' : '}}
                                @if($office->pivot->user_id == null or $office->pivot->active == 0)
                                    <a href="{{url('offices/'.$office->id.'/apply-for')}}" role="button" class="btn btn-sm btn-outline-success">Apply</a>
                                @else
                                    <a href="{{url('users/'.$office->pivot->user_id)}}" class="text-primary">{{ $office->pivot->user_name. ' (In office)'}}</a>{{' (In office)'}}
                                @endif
                            </li>--}}

                            <li class="list-group-item">{{$office->name. ' : '}}
                                <a href="{{url('users/'.$office->pivot->user_id)}}" class="text-primary">{{ $office->pivot->user_name}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <br>
                @endif
                <br>
                <br>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">जस्ट यूनाइट का नेतृत्व करें:</h4>
                    <p>जस्ट यूनाइट एक राजनीतिक मंच है जिसका मुख्य उद्देश्य नए लीडर्स का सृजन करना । हम उनको मदद करते है जो सही मायने में देश सेवा करना चाह्ते है ।
                        पदाधिकारी बनने का कोई शुल्क नहीं है, व्यक्ति के गुण और सोच के हिसाब से उनका चयन किया जायेगा। नतो  कोई मेम्बरशिप फीस है ।
                        हर लोकसभा क्षेत्र में ऊपर दिए गए पांचो पदाधिकारी होंगे । अप्लाई का बटन दबा के अपना एप्लीकेशन दर्ज करे ।
                        एक व्यक्ति एक ही पद के लिए अप्लाई कर सकता है।
                    </p>
                    <p>धन्यवाद् </p>
                </div>

                <br>
                <br>
            </div>
            <div class="col-md-3">
                @include('layouts.partials.side-menu')
            </div>

        </div>
        <br>
    </div>
@endsection

