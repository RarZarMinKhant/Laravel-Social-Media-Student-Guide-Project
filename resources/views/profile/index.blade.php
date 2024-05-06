<x-master>
    <h5>Name :{{ $user?->name }}</h5>
    <h5>Email :{{ $user?->email }}</h5>
    <h5>Joined :{{ $user?->created_at->format('d - m - Y') }}</h5>

    <p>==============================================</p>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($user?->blogs as $blog)
            <div class="col">
                <h5 class="card-title">{{ $blog->user->name }}</h5>
                <p class="card-title">{{ $blog->created_at->diffForHumans() }}</p>
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ $blog->description }}</p>
                        <button class="btn btn-warning">{{ $blog->category?->name }}</button>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="card-link">Read more</a>
                        @if ($user?->id == $blog->user_id)
                            <a href="{{ route('blog.edit', $blog->id) }}" class="card-link">Edit</a>
                            <a href="{{ route('blog.destroy', $blog->id) }}" class="card-link text-danger">Delete</a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <h3>There is no data</h3>
            </div>
        @endforelse
    </div>
</x-master>
