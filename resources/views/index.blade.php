<x-master>
    @if (session('message'))
        <div style="color: green">
            {{ session('message') }}
        </div>
    @endif
    <div class="mx-20">
        <form class="flex items-center justify-between space-x-2 my-2">
            <select name="category" class="border p-1 rounded-md border-gray-800">
                @foreach ($categories as $category)
                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="text" name="search" value="{{ request('search') }}"
                class="w-full border p-1 rounded-md border-gray-800" placeholder="Search">
            <button type="submit" class="bg-gray-800 p-1 rounded-md text-white">Search</button>
        </form>
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
