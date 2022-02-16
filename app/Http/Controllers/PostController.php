<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $auth = auth()->user();
        if (isset($auth)) {
            $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

            return view('posts.index', [
                'posts' => $posts
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }

    public function destroy(Post $post)
    {

        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
