@extends('layouts.app')

@section('content')
    <div class="container form-control">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="m-3">
                    <img src="{{ asset('images/posts/' . $post->image) }}" class="img-fluid" alt="...">

                    <h1 class="text">{{ $post->title }}</h1>

                    <p>{!! $post->body !!}</p>

                    <p class="card-text">
                        <small class="text">
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


