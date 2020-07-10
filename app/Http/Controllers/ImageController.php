<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function show()
    {
        $image = Image::where('user_id', '=', Auth::id())->first();
        if(!$image) {
            return view('image.add');
        }
        return view('image.add', [
            'image' => $image->image_src
        ]);
    }

    public function create()
    {
        return view('image.add');
    }

    public function store(Request $request)
    {
        $img = new Image();
        $imageExist = Image::where('user_id', '=', Auth::id())->first();
        $inputs = $request->all();

        //Check if request array is empty
        if(!$request->hasFile('image_src')) {
            return Redirect::back()->withErrors(['alert' => 'Please choose an image']);
        }

        //Store image in case of no image for current user
        if(!$imageExist) {
            $image = $request->file('image_src');
            $inputs['image_src'] = time() . '.' . $image->extension();
            $image->move(public_path('storage/images'), $inputs['image_src']);
            $img->user_id = Auth::id();
            $img->fill($inputs);
            $img->save();
        //Else delete the previous image and store another one
        } else {
            $imagePath = 'storage/images/' . $imageExist->image_src;
            $imageExist->delete();
            unlink($imagePath);
            $image = $request->file('image_src');
            $inputs['image_src'] = time() . '.' . $image->extension();
            $image->move(public_path('storage/images'), $inputs['image_src']);
            $img->user_id = Auth::id();
            $img->fill($inputs);
            $img->save();
        }

        return redirect('/posts')->with(['msg'=>'Image uploaded successfully!']);
        
    }
}
