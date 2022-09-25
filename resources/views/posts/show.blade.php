@extends('layouts.app')

@section('content')
    <div class="container bg-secondary bg-gradient">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="m-3">
                    <img src="..." class="card-img-top " alt="...">

                    <h1 class="text-light">{{ $post->title }}</h1>

                    <textarea name="body" id="" cols="30" rows="20" class="form-control">{{ $post->body }}</textarea>

                    <p class="card-text">
                        <small class="text-light">
                            {{ $post->user_id }} |
                            {{ $post->category_id }} |
                            {{ $post->publication_date }}
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
