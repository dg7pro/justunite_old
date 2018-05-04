<?php

namespace App\Http\Controllers;

use App\Image;
use App\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * ImageController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Image $image
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Image $image)
    {
        $this->authorize('manage_site');
        $professions = Profession::all();
        return view('image.edit',compact('image','professions'));
    }

    /**
     * @param Request $request
     * @param Image $image
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Image $image)
    {
        $this->authorize('manage_site');

        $this->validator($request->all())->validate();

        $image->name = $request->name;
        $image->association = $request->profession;
        $image->heading = $request->heading;
        $image->caption = $request->caption;

        $image->update();
        //Flash Message
        Session::flash('message', 'Image updated successfully!');
        return back();
    }

    /**
     * @param Image $image
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Image $image)
    {
        $this->authorize('manage_site');

        Storage::delete('public/'.$image->name);

        $image->delete();
        return redirect()->back();
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'=>'required',
            'profession'=>'required',
            'heading' => 'required',
            'caption' => 'required'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function imageCrop()
    {
        return view('imageCrop');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
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
