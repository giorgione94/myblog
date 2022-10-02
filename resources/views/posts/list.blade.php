@extends('layouts.app')
@include('alerts')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <div class="card m-3">
                        <img src="{{ asset('images/posts/' . $post->image) }}" class="card-img-top img-thumbnail w-25"
                            alt="...">
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
                                Show This Article
                            </a>

                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">
                                Edit Article
                            </a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
@section('footer')
    <div class="container">
        <div class="row">
            <div class="col-6 text">
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                        </svg>
                    </li>
                </ul>
            </div>
            <div class="col-6 text">
                <h4>About Company</h4>

                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam enim ut dicta mollitia, neque esse ea
                    fugiat iure consequuntur iusto? Atque consequatur sint harum natus ex quisquam similique doloribus
                    reiciendis!</p>

                Icone Siti
            </div>
        </div>
    </div>
@endsection
