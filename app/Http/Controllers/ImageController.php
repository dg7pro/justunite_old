<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Image $image)
    {
        $this->authorize('manage_site');
        return view('image.edit',compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $this->authorize('manage_site');
        $this->validator($request->all())->validate();

        $image->name = $request->name;
        $image->heading = $request->heading;
        $image->caption = $request->caption;

        $image->update();
        //Flash Message
        Session::flash('message', 'Image updated successfully!');
        return back();
    }

    public function destroy(Image $image)
    {
        $this->authorize('manage_site');
        $image->delete();
        return redirect()->back();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'=>'required',
            'heading' => 'required',
            'caption' => 'required'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageCrop()
    {
        return view('imageCrop');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageCropPost(Request $request)
    {
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        //$image_name= time().'.png';
        $image_name = Auth::user()->uuid.'.png';
        $path = public_path() . "/upload/" . $image_name;

        file_put_contents($path, $data);
        return response()->json(['success'=>'done']);
    }
}
