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

        if(auth()->user()->em_verified == 1){
            Session::flash('message', 'You have already verified your email!');
            //return redirect()->back();
            return back();
        }
        //dd($OTP);
       /* $OTP = rand(1000,9999);
        Cache::put(['OTP'=>$OTP],Carbon::now()->addMinutes(5));
        Mail::to('justunite007@gmail.com')->send(new OTPMail($OTP));*/

        auth()->user()->sendOTP();
        return view('verify-otp');

    }

    public function verifyEmail(Request $request){

        //dd(request('otp'));

        //return Cache::get('OTP');
        if($request->otp == Cache::get(auth()->user()->OTPKey())){

            Auth::user()->update(['em_verified' => true]);
            //return response(null,201);
            Session::flash('message', 'Welcome! You have successfully verified your email!');
            return redirect('home');
        }
        return 'Not Ok';
    }
}
