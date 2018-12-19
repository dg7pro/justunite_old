<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class VerifyController extends Controller
{
    public function showVerifyEmailPage(){

        return view('verify-email');

    }

    public function sendVerificationEmail(){

        if(auth()->user()->em_verified == 1){
            Session::flash('warning', 'You have already verified your email!');
            return back();
        }
        auth()->user()->sendOTP();
        Session::flash('message', 'One Time Password(OTP) successfully send to your Email!');
        return $this->showVerifyEmailPage();

    }

    public function verifyEmail(Request $request){

        if($request->otp == Cache::get(auth()->user()->OTPKey())){

            Auth::user()->update(['em_verified' => true]);
            Cache::forget(auth()->user()->OTPKey());
            Session::flash('success', 'Welcome! You have successfully verified your email!');
            return redirect('home');

        }else{
            Session::flash('error', 'Oops! You have entered the wrong OTP');
            //return $this->showVerifyEmailPage();
            return back();
        }
    }

    /*
     * Mobile Verification
     * */

    public function showVerifyMobilePage(){

        return view('verify-mobile');

    }

    public function sendVerificationSMS(){

        if(auth()->user()->mb_verified == 1){
            Session::flash('message', 'You have already verified your mobile!');
            return back();
        }
        auth()->user()->sendMobileOTP();
        Session::flash('success', 'One Time Password(OTP) successfully send on your Mobile number! You may receive sms within 5 min');
        return $this->showVerifyMobilePage();
    }

    public function verifyMobile(Request $request){

        if($request->otp == Cache::get(auth()->user()->OTPKey())){

            Auth::user()->update(['mb_verified' => true]);
            Cache::forget(auth()->user()->OTPKey());
            Session::flash('success', 'Welcome! You have successfully verified your mobile number!');
            return redirect('home');

        }else{

            Session::flash('error', 'Oops! You have entered the wrong OTP');
            //return $this->showVerifyMobilePage();
            return back();
        }
    }
}
