<x-master>
    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        <h3>Create Form</h3>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <input type="text" name="description" value="{{ old('description') }}">
        @error('description')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <button>Create</button>
    </form>
</x-master>
