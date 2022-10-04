@extends('layouts.app')
@include('alerts')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>YOUR POSTS</h1>

                        <a href="{{ route('posts.create') }}" class="btn btn-outline-primary mb-2">New Post</a>

                        <table class="table table-success table-striped">
                            <thead>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Publication_Date</th>
                                <th>Show</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <a href="{{ route('posts.edit', $post) }}">
                                                {{ $post->title }}
                                            </a>
                                        </td>
                                        <td>{{ $post->category->title }}</td>
                                        <td>{{ $post->publication_date }}</td>
                                        <td>
                                            <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary">
                                                <i class="bi bi-eye" width="16" height="16"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                class="">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="bi bi-trash" width="16" height="16"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h2>CATEGORIES</h2>

                        <a href="{{ route('categories.create') }}" class="btn btn-outline-primary mb-2">New Category</a>

                        <table class="table">
                            <thead>
                                <th>Title</th>
                                <th>Show</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="table-active">
                                        <td>
                                            <a href="{{ route('categories.edit', $category) }}">
                                                {{ $category->title }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.show', $category) }}"
                                                class="btn btn-outline-primary">
                                                <i class="bi bi-eye" width="16" height="16"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                                class="">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="bi bi-trash" width="16" height="16"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('editProfile') }}" class="btn btn-outline-primary mb-2">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
