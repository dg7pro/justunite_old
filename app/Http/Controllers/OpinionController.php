<?php

namespace App\Http\Controllers;

use App\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{
    /**
     * OpinionController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        //$this->authorize('manage_site');

        $opinions = Opinion::with('user')
            /*->withCount('likedBy')*/
            ->get();
        //return $opinions;
        return view('opinion.index',compact('opinions'));
    }

    /*public function index2(Request $request)
    {
        $opinions = Opinion::with('user')->paginate(1);
        $html='';
        foreach ($opinions as $opinion) {
            //$html.='<li>'.$opinion->id.' <strong>'.$opinion->name.'</strong> : '.'<br>'.$opinion->headquarter.'</li>';


            $html.='<div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">' . $opinion->user->name . '\'s' . ' opinion' . '</h4>
                        <p>' . $opinion->matter . '</p>
                        <div class="text-right">
                            <b class="pull-left" style="padding-top: 8px">' . $opinion->created_at->diffForHumans() . '</b>
                            <b>' . ' 546 Likes' . '</b>
                            <a href="" role="button" style="padding-right: 2em">
                                <i class="'. "fa fa-thumbs-o-up fa-2x fa-flip-horizontal" . '" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>';

        }
        if ($request->ajax()) {
            return $html;
        }

        return view('opinion.index2',compact('opinions'));
    }*/


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* $id = Auth::id();
        $opinion = Opinion::where('user_id','=',$id)->first();*/

        $opinion = Auth::user()->opinion()->first();
        if($opinion){
            return $this->edit($opinion);
        }else {
            return view('opinion.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Inputs
        $this->validator($request->all())->validate();

        // Add New Course
        $opinion = new Opinion();
        $opinion->user_id = Auth()->id();
        $opinion->matter = $request->matter;
        $opinion->active = isset($request['active']);
        $opinion->save();

        //Flash Message
        Session::flash('message', 'Your view has been submitted for review successfully!');

        // Redirect Back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function show(Opinion $opinion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinion $opinion)
    {
        return view('opinion.edit',compact('opinion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opinion $opinion)
    {
        $this->validator($request->all())->validate();

        /*if(!isset( $request['active'])){
            $request->active = 0 ;
            }else{
            $request->active = 1 ;
        }*/

        $opinion->matter = $request->matter;
        $opinion->active = isset($request['active']);
        $opinion->update();

        //Flash Message
        Session::flash('message', 'Opinion updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinion $opinion)
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
            'matter' => 'required|string'
        ]);
    }
}
