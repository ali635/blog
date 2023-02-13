<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(CommentRequest $request)
    {
        
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect()->route('posts.show',$request->post_id);
    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

   
    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy(Comment $comment)
    {
        //
    }
}
