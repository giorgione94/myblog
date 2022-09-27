@extends('layouts.app')
@include('errors')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-control bg-dark bg-gradient">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label text-white">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label text-white">Cover_Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label text-white">Subtitle</label>
                            <input type="text" name="subtitle" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label text-white">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="publication_date" class="form-label text-white">Publication_Date</label>
                            <input type="date" name="publication_date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label text-white">Choose Category</label>
                            <select class="form-select" id="inputGroupSelect01" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
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
@endsection
