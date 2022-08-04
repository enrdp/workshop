<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        $post = Post::where('id', $post->id)->first();
        
        return view('posts.show', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
        }

        $request->file->store('post', 'public');

        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            "file_path" => $request->file->hashName()
        ]);

        return redirect()->route('posts.index');
    }

    public function create()
    {
        return view('posts.create');
    }
}
