@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-3">
            <img src="{{asset('/storage/' .$post->photo)}}" class="rounded mx-auto d-block" alt="...">
            <div class="card-body text-center">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->body}}</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
            <div class="card-body">
                <h3 class="card-title">comments</h3>
                @foreach ($post->comments as $comment)
                    <h5 class="card-title ms-2">{{$comment->user->name}}</h5>
                    <p class="card-text ms-3">{{$comment->body}}</p>
                @endforeach
              </div>

            <form class="form"
                action="{{ route('comments.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="p-3 mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Write Comment</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
                    <button type="submit" class="btn btn-primary mt-2">Create Comment</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection