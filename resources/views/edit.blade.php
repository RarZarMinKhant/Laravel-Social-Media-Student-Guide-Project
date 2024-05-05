<x-master>
    <form action="{{ route('blog.update', $blog->id) }}" method="POST">
        @csrf
        <h3>Edit Form</h3>
        <input type="text" name="title" value="{{ $blog->title }}">
        @error('title')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <input type="text" name="description" value="{{ $blog->description }}">
        @error('description')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <button>Update</button>
    </form>
</x-master>
