@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Account Information:</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{'images/blank-profile-picture.png'}}" class="img-circle img-responsive"> </div>

                            <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                              <dl>
                                <dt>DEPARTMENT:</dt>
                                <dd>Administrator</dd>
                                <dt>HIRE DATE</dt>
                                <dd>11/12/2013</dd>
                                <dt>DATE OF BIRTH</dt>
                                   <dd>11/12/2013</dd>
                                <dt>GENDER</dt>
                                <dd>Male</dd>
                              </dl>
                            </div>-->
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td>{{Auth::user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>01/24/1988</td>
                                    </tr>

                                    <tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>Home Address</td>
                                        <td>Kathmandu,Nepal</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><a href="mailto:info@support.com">{{Auth::user()->email}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Last Login:</td>
                                        <td>06/23/2013</td>
                                    </tr>

                                    </tbody>
                                </table>

                                <a href="{{url('change-email')}}" class="btn btn-primary">Change Email</a>
                                <a href="{{url('change-password')}}" class="btn btn-primary">Change Password</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a data-original-title="Update profile Image" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">{{--<i class="glyphicon glyphicon-envelope"></i>--}} Update Image</a>
                        <span class="pull-right">
                            <a href="#" data-original-title="View your Profile" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-view"></i> View Profile</a>
                            <a data-original-title="Edit your Profile" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection