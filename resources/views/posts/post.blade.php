@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 p-2">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('/storage/' .$post->photo)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="text-right"><i class="fa-solid fa-user"></i>{{$post->user->name}}</p>
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->body }}</p>
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">show post</a>
                    </div>
                    <div class="card-footer text-muted">
                        Created at {{ $post->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection