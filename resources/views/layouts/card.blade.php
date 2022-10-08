<div class="card m-3 col-md-3">
    <img src="{{ asset('images/posts/' . $post->image) }}" class="img-fluid"
        alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-subtitle">{{ $post->subtitle }}</p>
        <p class="card-text">
            <small class="text-muted">
                <a href="{{ route('author', $post->user->id) }}">
                    {{ $post->user->name }}
                </a>
                |
                <a href="{{ route('categories.show', $post->category) }}">
                    {{ $post->category->title }}</a> |
                {{ $post->publication_date }}
            </small>
        </p>
        <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary bg-gradient">
            Read More
        </a>
    </div>
</div>