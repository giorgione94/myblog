@extends('layouts.app')

@section('content')
    <div class="container bg-secondary bg-gradient">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="m-3">
                    <img src="{{ asset('images/authors/' . $author->profile_image) }}" class="card-img-top img-thumbnail img"
                        alt="...">

                    <h1 class="text-light">{{ $author->name }}</h1>
                    <p> {{ $author->bio }}</p>

                    @foreach ($posts as $post)
                        @include('layouts.card')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
