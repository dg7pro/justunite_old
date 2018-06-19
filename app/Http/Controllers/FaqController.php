<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::with(['faqs' => function($query){
            $query->orderBy('que_order','asc');
        }])->orderBy('order','asc')
            ->get();

        //return $tags;

        return view('faq.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('faq.create',compact('tags'));
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
        $faq = new Faq();
        $faq->tag_id = $request->tag;
        $faq->que_order = $request->sequence;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->icon = $request->icon;
        $faq->color = $request->color;

        $faq->save();

        //Flash Message
        Session::flash('message', 'Faq created successfully!');

        // Redirect Back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $tags = Tag::all();
        return view('faq.edit',compact('faq','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        // Validate Inputs
        $this->validator($request->all())->validate();

        // Update New Course
        $faq->tag_id = $request->tag;
        $faq->que_order = $request->sequence;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->icon = $request->icon;
        $faq->color = $request->color;

        $faq->update();

        //Flash Message
        Session::flash('message', 'Faq updated successfully!');

        // Redirect Back
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        Session::flash('message', 'Faq deleted successfully!');
        return redirect()->back();

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
            'tag' => 'required',
            'sequence' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'icon' => 'required',
            'color' => 'required'
        ]);
    }
}
