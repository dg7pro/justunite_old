@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Edit Existing User</h2>

                <p>Display form to edit user model</p>
                {{$user}}

            </div>
        </div>
    </div>
@endsection