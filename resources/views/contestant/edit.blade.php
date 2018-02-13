@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Edit Existing Contestant</h2>

                <p>Display form to edit contestant model</p>
                {{$contestant}}

            </div>
        </div>
    </div>
@endsection