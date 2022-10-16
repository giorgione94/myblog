<div class="col">
    <div class="card m-3">
        <img src="{{ asset('images/posts/' . $post->image) }}" class="cover" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-subtitle crop-text-3">{{ $post->subtitle }}</p>
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
            <span>{{ count($post->likes) }}</span>
        </div>
    </div>
</div>
