@extends('layouts.app')

@section('content')
    <div class="container bg-secondary bg-gradient">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="m-3">
                    <img src="{{ asset('images/posts/' . $post->image) }}" class="card-img-top img-thumbnail w-25" alt="...">

                    <h1 class="text-light">{{ $post->title }}</h1>

                    <p>{{ $post->body }}</p>

                    <p class="card-text">
                        <small class="text-light">
                            {{ $post->user->name }} |
                            {{ $post->category->title }} |
                            {{ $post->publication_date }}
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
