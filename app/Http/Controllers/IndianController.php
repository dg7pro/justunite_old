<?php

namespace App\Http\Controllers;

use App\Category;
use App\Indian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndianController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$categories = Category::with(['indians'=> function($query){
            $query->orderBy('name','asc');
        }])->orderBy('name','asc')->get();*/

        $categories = Category::with(['indians'=> function($query){
            $query->orderBy('name','asc');
        }])->get();

        $likedIds = null;
        if(Auth::user()){
            $user = Auth::user();
            $likedIds = $user->indians()->pluck('id')->toArray();
        }


        //return $tags;

        return view('indian.index',compact('categories','likedIds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('manage_site');
        $categories = Category::all();
        return view('indian.create',compact('categories'));
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

        $indian = new Indian();
        $indian->category_id = $request->category_id;
        $indian->name = $request->name;
        $indian->suggested_by = $request->suggested_by;
        $indian->save();

        //Flash Message
        Session::flash('message', 'Name added successfully!');

        // Redirect Back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indian  $indian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $indian = Indian::with('elinks')->find($id);
        //return $indian;
        return view('indian.show',compact('indian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indian  $indian
     * @return \Illuminate\Http\Response
     */
    public function edit(Indian $indian)
    {
        $categories = Category::all();
        return view('indian.edit',compact('indian','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indian  $indian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indian $indian)
    {
        $this->authorize('manage_site');
        $this->validator($request->all())->validate();
        $indian->update($request->all());
        //Flash Message
        Session::flash('message', 'Indian updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indian  $indian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indian $indian)
    {
        //Not Required
        /*$this->authorize('manage_site');
        $indian->delete();
        return redirect('indians');*/
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
            'category_id'=>'required',
            'suggested_by'=>'required',
            'name' => 'required',
        ]);
    }

}
