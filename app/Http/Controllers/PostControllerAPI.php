<?php

namespace App\Http\Controllers;

use App\Image;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostControllerAPI extends Controller
{
    public function index()
    {
        $posts = Post::where('status', '=', 'published')->with('user.image')->get();

        return response()->json([
            'posts' => $posts
        ]);
    }

    public function show($id)
    {
        $post = Post::where('id', '=', $id)->with('user.image')->first();

        return response()->json([
            'post' => $post
        ]);
    }

    public function getImages()
    {
        $images = Image::all();

        return response()->json([
            'images' => $images
        ]);
    }
}
