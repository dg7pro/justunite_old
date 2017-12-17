<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendVerificationEmail;

class AccountController extends Controller
{
    /**
     * AccountController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword(){

        return view('account.change-password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function postPasswordCredentials(Request $request)
    {
        if (Auth::Check()) {
            $request_data = $request->All();
            $validator = $this->password_credential_rules($request_data);
            if ($validator->fails()) {
                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            } else {
                $current_password = Auth::User()->password;
                if (Hash::check($request_data['current-password'], $current_password)) {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save();
                    return redirect()->to('home')->withSuccessMessage('Password Successfully Changed!');
                    //return "ok";
                } else {
                    $error = array('current-password' => 'Please enter correct current password');
                    return response()->json(array('error' => $error), 400);
                }
            }
        } else {
            return redirect()->to('/');

        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function password_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',
        ], $messages);

        return $validator;
    }

    public function changeEmail(){

        return view('account.change-email');
    }

    public function postEmailCredentials(Request $request)
    {
        if (Auth::Check()) {
            $request_data = $request->All();
            $validator = $this->email_credential_rules($request_data);
            if ($validator->fails()) {
                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            } else {
                $current_password = Auth::User()->password;
                if (Hash::check($request_data['current-password'], $current_password)) {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->email = $request_data['email'];
                    $obj_user->verified = 0;
                    $obj_user->save();

                    dispatch(new SendVerificationEmail($obj_user));
                    Auth::logout();
                    $message = "Email changed successfully. An email is sent on your new email for verification.";
                    return view('auth.verify')->with('message',$message);

                } else {
                    $error = array('current-password' => 'Please enter correct current password');
                    return response()->json(array('error' => $error), 400);
                }
            }
        } else {
            return redirect()->to('/');

        }
    }

    public function email_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter your current password',
            'email.required' => 'Please enter new email',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'email' => 'required|same:email',
            'email_confirmation' => 'required|same:email',
        ], $messages);

        return $validator;
    }

    public function myAccount(){

        return view('account.my-account');
    }





}
