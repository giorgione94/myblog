@extends('layouts.app')

@section('content')
    <div class="container bg-secondary bg-gradient">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="m-3">
                    <img src="" class="card-img-top img-thumbnail img" alt="...">

                    <h1 class="text-light"></h1>
                    <p></p>

                    @foreach ($posts as $post)
                    <div class="card m-2">
                        <img src="{{ asset('images/posts/' . $post->image) }}" class="card-img-top img-thumbnail w-25" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-subtitle">{{ $post->subtitle }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    {{ $post->user->name }} |
                                    {{ $post->category->title }} |
                                    {{ $post->publication_date }}
                                </small>
                            </p>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary bg-gradient">
                                Read more
                            </a>
                        </div>
                    </div>
                    
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
