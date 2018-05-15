<?php

namespace App\Http\Controllers;

use App\Image;
use App\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfessionController extends Controller
{
    /**
     * ProfessionController constructor.
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
        $this->authorize('manage_site');

        $professions = Profession::all();
        return view('profession.index',compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('manage_site');
        return view('profession.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('manage_site');

        // Validate Inputs
        $this->validator($request->all())->validate();

        $profession = new Profession();
        $profession->category = $request->category;
        $profession->details = $request->details;
        $profession->save();

        //Flash Message
        Session::flash('message', 'Profession added successfully!');

        // Redirect Back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        $images = $profession->images()->get();
        return view('profession.show',compact('profession','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        $this->authorize('manage_site');
        return view('profession.edit',compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
        $this->authorize('manage_site');
        $this->validator($request->all())->validate();
        $profession->update($request->all());
        //Flash Message
        Session::flash('message', 'Profession updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
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
            'category'=>'required',
            'details' => 'required',
        ]);
    }

    public function uploadImage(Profession $profession, Request $request){

        // Upload & save file to directory
        $file = $request->file('image');
        $filename  = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/',$filename);

        $image = New Image();
        $image->name = $filename;
        $image->heading = $request->heading;
        $image->caption = $request->caption;

        $profession->images()->save($image);
        return redirect()->back();

    }

    public function like(Request $request){

        $id = $request->professionid;
        //Auth::user()->knows()->attach($id);
        Auth::user()->likeProfessions()->attach($id);

        $profession = Profession::where('id','=',$id)->first();
        $profession_like_count = $profession->userLikes()->count();

        return response()->json(['message'=>'You have successfully liked ', 'id'=>$id, 'kbc'=>$profession_like_count]);
    }

}
