<x-master>
    <div class="mx-20">
        @forelse ($users as $user)
            <div>
                <h1>{{ $user->name }}</h1>
                <h1>{{ $user->email }}</h1>
                <a href="#" class="text-blue-500">Add Friends</a>
                <a href="#" class="text-blue-500">Remove</a>
            </div>
        @empty
            <div class="col">
                <h3>There is no users</h3>
            </div>
        @endforelse
    </div>
</x-master>
