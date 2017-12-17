@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Change Password</div>
                    <div class="panel-body">
                        <form id="form-change-password" role="form" method="POST" action="{{ url('change-email') }}" novalidate class="form-horizontal">
                            <div class="col-md-10">
                                <label for="current-password" class="col-sm-4 control-label">Current Password</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
                                    </div>
                                </div>
                                <label for="email" class="col-sm-4 control-label">New Email</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <label for="email_confirmation" class="col-sm-4 control-label">Re-enter Email</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email_confirmation" name="email_confirmation" placeholder="Re-enter Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-5 col-sm-6">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection