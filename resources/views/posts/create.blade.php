@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form"
            action="{{ route('posts.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">body</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Post Image</label>
                <input class="form-control" type="file" name="photo" id="formFile">
              </div>
            <button type="submit" class="btn btn-primary">create post</button>
        </form>
    </div>
@endsection