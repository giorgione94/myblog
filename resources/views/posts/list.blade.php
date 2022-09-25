@extends('layouts.app')

@section('content')
    <div class="container bg-primary bg-gradient">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <div class="card m-3">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-subtitle">{{ $post->subtitle }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    {{ $post->user_id }} |
                                    {{ $post->category_id }} |
                                    {{ $post->publication_date }}
                                </small>
                            </p>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary bg-gradient">
                                Show This Article
                            </a>

                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">
                                Edit Article
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
