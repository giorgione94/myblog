@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-4">
            @foreach ($posts as $post)
                @include('layouts.card')
            @endforeach
        </div>
    </div>
@endsection
