<x-master>
    <div class="w-full flex flex-col items-center justify-center">
        <h5>Name :{{ $user?->name }}</h5>
        <h5>Email :{{ $user?->email }}</h5>
        <h5>Joined :{{ $user?->created_at->format('d - m - Y') }}</h5>
    </div>
    <div class="mx-20">
        @forelse ($user?->blogs as $blog)
            <x-molecules.blog-card :data="$blog" />
        @empty
            <div class="col">
                <h3>There is no data</h3>
            </div>
        @endforelse
    </div>
</x-master>
