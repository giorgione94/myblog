@extends('layouts.app')
@include('errors')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-control bg-gradient edit">

                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label ">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                        </div>

                        <div class="mb-3">
                            <img src="{{ asset('images/posts/' . $post->image) }}" class="card-img-top img-thumbnail w-25" alt="...">
                            <label for="file" class="form-label">Cover_Image</label>
                            <input type="file" name="image" class="form-control mt-3">
                        </div>

                        <div class="mb-3">
                            <label for="subtitle" class="form-label ">Subtitle</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ $post->subtitle }}">
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label ">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control ckeditor">{{ $post->body }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="publication_date" class="form-label ">Publication_Date</label>
                            <input type="date" name="publication_date" class="form-control"
                                value="{{ $post->publication_date }}">
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label ">Choose Category</label>
                            <select class="form-select" id="inputGroupSelect01" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

@endsection

