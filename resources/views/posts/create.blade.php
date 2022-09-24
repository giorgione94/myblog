@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="title"> Required
                    <input type="file" name="cover_image"> Nullable
                    <input type="text" name="subtitle"> Required
                    <textarea name="body" id="body" cols="30" rows="10"></textarea> Required
                    <input type="date" name="publication_date" id=""> Unsigned
                    <input type="text" name="category_id"> Unsigned

                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
