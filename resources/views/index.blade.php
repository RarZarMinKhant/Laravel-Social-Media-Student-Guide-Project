<x-master>
    @if (session('message'))
        <div style="color: green">
            {{ session('message') }}
        </div>
    @endif
    <div class="container">
        <form class="input-group mb-3 mt-3">
            <select name="category" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search"
                aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button type="submit" class="input-group-text" id="basic-addon2">Search</button>
            </div>
        </form>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($blogs as $blog)
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
                            @if (auth()->user()?->id == $blog->user_id)
                                <a href="{{ route('blog.edit', $blog->id) }}" class="card-link">Edit</a>
                                <a href="{{ route('blog.destroy', $blog->id) }}"
                                    class="card-link text-danger">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <h3>There is no data</h3>
                </div>
            @endforelse
            <div class="row justify-content-center">
                <div class="col-md-6">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-master>
