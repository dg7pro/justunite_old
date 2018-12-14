<?php

namespace App\Http\Controllers;

use App\Notifications\MessageAllUsers;
use App\Notifications\NewArticlePublished;
use App\Notifications\NotifyAllUsers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * MessageController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('manage_site');

        $messages = Message::all();
        return view('message.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('message.create');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('manage_site');

        // Validate Inputs
        $this->validator($request->all())->validate();

        // Add New Age Group
        $msg = new Message();
        $msg->subject = $request->subject;
        $msg->message = $request->message;
        $msg->url = $request->url;
        $msg->save();

        //Flash Message
        Session::flash('message', 'Education Level created successfully!');

        // Redirect Back
        return redirect('messages');
    }


    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Message $message)
    {
        $this->authorize('manage_site');
        return view('message.show',compact('message'));
    }


    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Message $message)
    {
        return view('message.edit',compact('message'));
    }


    /**
     * @param Request $request
     * @param Message $message
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Message $message)
    {
        $this->authorize('manage_site');

        // Validate Inputs
        $this->validator($request->all())->validate();

        // Update Message
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->url = $request->url;
        $message->update();

        //Flash Message
        Session::flash('message', 'Message updated successfully!');

        // Redirect Back
        //return redirect('messages');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'subject' => 'required',
            'message' => 'required',
            'url' => 'required',
        ]);
    }

    /*public function sendMessage(Request $request){

        //return 'message ready';
        //dd($request);

        $users = User::find(2158);
        $when = Carbon::now()->addSeconds(2);
        Notification::send($users, (new NewArticlePublished($request))->delay($when));

        return 'Notification queued for delivery';

    }*/

    public function sendMessage(Request $request, Message $msg){

        switch ($request->input('action')) {

            case 'save':

                return $this->update($request, $msg);

                break;

            case 'test-notify':

                $user = Auth()->user();
                $when = Carbon::now()->addSeconds(2);
                Notification::send($user, (new NotifyAllUsers($request))->delay($when));

                //Flash Message
                Session::flash('message', 'Notification send successfully!');
                return back();
                break;

            case 'notify':

                $users = User::all();
                $when = Carbon::now()->addSeconds(2);
                Notification::send($users, (new NotifyAllUsers($request))->delay($when));
                //$msg->update(['send'=>true]);
                $msg->increment('send');

                //Flash Message
                Session::flash('message', 'Notification queued for delivery!');
                return back();
                break;

            case 'test-msg':

                $user = Auth()->user();
                $when = Carbon::now()->addSeconds(2);
                Notification::send($user, (new MessageAllUsers($request))->delay($when));

                //Flash Message
                Session::flash('message', 'Message send successfully!');
                return back();
                break;

            case 'message':

                $users = User::all();
                $when = Carbon::now()->addSeconds(2);
                Notification::send($users, (new MessageAllUsers($request))->delay($when));
                //$msg->update(['send'=>true]);
                $msg->increment('send');

                //Flash Message
                Session::flash('message', 'Message queued for delivery!');
                return back();
                break;
        }

    }
}
