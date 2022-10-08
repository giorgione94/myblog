@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-group col-md-12">
                @foreach ($posts as $post)
                    @include('layouts.card')
                @endforeach
            </div>
        </div>
    </div>
@endsection
