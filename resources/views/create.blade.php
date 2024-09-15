<x-master>
    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Create Form</h3>
        <input type="file" name="images[]" accept="image/png, image/jpeg, image/jpg" multiple
            class="border border-blue-500">

        <input type="text" name="title" class="border border-blue-500" value="{{ old('title') }}">
        @error('title')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <input type="text" name="description" class="border border-blue-500" value="{{ old('description') }}">
        @error('description')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <button>Create</button>
    </form>
</x-master>
