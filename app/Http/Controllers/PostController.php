<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();

        $searchTerm = $request->input('search');

        $searchQuery = Post::search(['title'], $searchTerm)
            ->get();

        return view('posts.index', ['posts' => $posts, 'searchs' => $searchQuery]);
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

    public function create(User $user, Post $post)
    {
        $this->authorize('create', $post);
        //dd(Auth::user()->roles[0]->name);
        return view('posts.create');
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);


        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $path = storage_path('app/public/post/');
        unlink($path . $post->file_path);
        $image = $request->file('file');
        $filename = $image->getClientOriginalName();
        $image->move(storage_path('app/public/post'), $filename);
        $post->image = $request->file('file')->getClientOriginalName();
        }
        
        Post::where('id', $post->id)->update([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'file_path' => $post->image
        ]);

        return redirect()->route('posts.index');
        

    }
    public function edit(Post $post)
    {
          $this->authorize('update', $post);
        $post = Post::where('id', $post->id)->first();

        return view('posts.update', ['post' => $post]);
        
    }
}
