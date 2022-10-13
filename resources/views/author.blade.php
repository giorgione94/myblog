@extends('layouts.app')

@section('content')
    <div class="container bg-secondary bg-gradient">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="m-3">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('images/authors/' . $author->profile_image) }}"
                                    class="card-img-top img-thumbnail img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $author->name }}</h5>
                                    <p class="card-text">{{ $author->bio }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-4">
                        @foreach ($posts as $post)
                            @include('layouts.card')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
