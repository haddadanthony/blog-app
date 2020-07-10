<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::where('user_id', '=', Auth::id())->get();
        $user = User::findOrFail(Auth::id());

        return view('posts.index', [
            'posts' => $posts,
            'user' => $user
        ]);
    }


    public function show($id)
    {
        $post = Post::where(['id' => $id])->first();

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $inputs = $request->all();

        $post->fill($inputs);
        $post->user_id = Auth::id();
        $post->status = 'draft';
        $post->save();

        return redirect('/posts')->with(['msg' => 'Post created with id ' . $post->id]);
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect('/posts')->with(['msg' => 'Deleted post with id ' . $post->id ]);
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->first();

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        $inputs = $request->all();
        if(!$request->publish_at) {
            return Redirect::back()->withErrors(['msg' => 'You should provide a Publish date']);
        }

        $post->fill($inputs);
        $post->update();

        return Redirect::route("post.show", $post->id)->with(['msg' => 'Updated post with id ' . $post->id]);
    }
}
