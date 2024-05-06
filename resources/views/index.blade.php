<x-master>
    @if (session('message'))
        <div style="color: green">
            {{ session('message') }}
        </div>
    @endif
    <div class="mx-20">
        {{-- <form class="input-group mb-3 mt-3">
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
        </form> --}}
        @forelse ($blogs as $blog)
            <x-molecules.blog-card :data="$blog" />
        @empty
            <div class="col">
                <h3>There is no data</h3>
            </div>
        @endforelse
        {{-- <div class="row justify-content-center">
            <div class="col-md-6">
                {{ $blogs->links() }}
            </div>
        </div> --}}
    </div>
</x-master>
