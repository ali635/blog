<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::with('user')->orderBy('id','DESC')->get();
        return view('posts.post', compact('posts'));
    }

  
    public function create()
    {
        return view('posts.create');
    }

  
    public function store(PostRequest $request)
    {
        
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        if($request->photo && $request->photo->isValid())
        {
            $file=$request->file('photo');
            $name='posts/'.uniqid().'.'.$file->extension();
            $file->storePubliclyAs('public',$name);
            $post->photo=$name;
        }
        $post->save();
        return redirect()->route('posts.index');
    }

   
    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('posts.show',compact('post'));
    }

  
    public function edit(Post $post)
    {
        //
    }

  
    public function update(Request $request, Post $post)
    {
        //
    }

   
    public function destroy(Post $post)
    {
        //
    }
}
