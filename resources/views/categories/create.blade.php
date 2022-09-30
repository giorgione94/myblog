@extends('layouts.app')
@include('errors')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-control bg-dark bg-gradient">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label text-white">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label text-white">Cover_Image</label>
                            <input type="file" name="cover_image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label text-white">Subtitle</label>
                            <input type="text" name="subtitle" class="form-control">
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
