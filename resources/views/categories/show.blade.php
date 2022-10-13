@extends('layouts.app')

@section('content')
    <div class="container bg-secondary bg-gradient">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="m-3">
                    <img src="{{ asset('images/categories/' . $category->cover_image) }}"
                        class="card-img-top img-thumbnail img" alt="...">

                    <h1 class="text-light">{{ $category->title }}</h1>
                    <p>{{ $category->subtitle }}</p>

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
