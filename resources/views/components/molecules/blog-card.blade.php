@props(['data'])

<div class="bg-white p-8 shadow-md rounded-lg m-3">
    <div class="flex items-center justify-between mb-4">
        <a href="/profile/{{ $data->user?->username }}" class="flex items-center space-x-2">
            <img src="https://icon2.cleanpng.com/20180523/wxj/kisspng-businessperson-computer-icons-avatar-clip-art-lattice-5b0508dc2ee812.2252011515270566041921.jpg"
                class="w-8 h-8 rounded-full">
            <div>
                <p class="text-gray-800 font-semibold">{{ $data->user?->name }}</p>
                <p class="text-gray-500 text-sm">Posted {{ $data->created_at->diffForHumans() }}</p>
            </div>
        </a>
        <div class="text-gray-500 cursor-pointer">
            <button class="hover:bg-gray-50 rounded-full p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="7" r="1" />
                    <circle cx="12" cy="12" r="1" />
                    <circle cx="12" cy="17" r="1" />
                </svg>
            </button>
        </div>
    </div>
    <!-- Message -->
    <div class="mb-4">
        <p class="text-gray-800">{{ $data->title }}</p>
        <p class="text-gray-800">{{ $data->description }}</p>
        {{ $data->category?->name }}
    </div>
    <div class="space-x-3">
        <a href="{{ route('blog.show', $data->slug) }}" class="text-blue-500">Read more</a>
        @can('blogManage', $data)
            <a href="{{ route('blog.edit', $data->id) }}" class="text-blue-500">Edit</a>
            <a href="{{ route('blog.destroy', $data->id) }}" class="text-red-500">Delete</a>
        @endcan
    </div>
    <div class="flex items-center justify-between text-gray-500">
        <form id="reactionForm-{{ $data->id }}" class="flex items-center space-x-2">
            <input name="postId" hidden value="{{ $data->id }}">
            <input name="userId" hidden value="{{ auth()->id() }}">
            <button type="button" onclick="submitReaction({{ $data->id }})"
                class="flex justify-center items-center gap-2 px-2 hover:bg-gray-50 rounded-full p-1">
                @if ($data->alreadyReaction)
                    <i class="fa-solid fa-heart text-red-500 reactionIcon"></i>
                @else
                    <i class="fa-regular fa-heart reactionIcon"></i>
                @endif

                <span>
                    <span id="reactionCount">
                        {{ $data->reactions->count() }}
                    </span>
                    Love
                </span>
            </button>
        </form>
        <button class="flex justify-center items-center gap-2 px-2 hover:bg-gray-50 rounded-full p-1">
            <svg width="22px" height="22px" viewBox="0 0 24 24" class="w-5 h-5 fill-current"
                xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22ZM8 13.25C7.58579 13.25 7.25 13.5858 7.25 14C7.25 14.4142 7.58579 14.75 8 14.75H13.5C13.9142 14.75 14.25 14.4142 14.25 14C14.25 13.5858 13.9142 13.25 13.5 13.25H8ZM7.25 10.5C7.25 10.0858 7.58579 9.75 8 9.75H16C16.4142 9.75 16.75 10.0858 16.75 10.5C16.75 10.9142 16.4142 11.25 16 11.25H8C7.58579 11.25 7.25 10.9142 7.25 10.5Z">
                    </path>
                </g>
            </svg>
            <span>2 Comment</span>
        </button>
    </div>
</div>
<script>
    function submitReaction(postId) {
        const formId = 'reactionForm-' + postId;
        const form = document.getElementById(formId);
        const formData = new FormData(form);
        const icon = form.querySelector('.reactionIcon');
        const currentCountElement = form.querySelector('#reactionCount');
        let reactionCount = parseInt(currentCountElement.textContent);

        axios.post('/api/toggle-reaction', formData).then(function(response) {
            if (response.data.message === 'like') {
                // Change to liked icon
                icon.classList.remove('fa-regular', 'fa-heart');
                icon.classList.add('fa-solid', 'fa-heart', 'text-red-500');
                reactionCount += 1;
            } else {
                // Change to unliked icon
                icon.classList.remove('fa-solid', 'fa-heart', 'text-red-500');
                icon.classList.add('fa-regular', 'fa-heart');
                reactionCount -= 1;
            }
            currentCountElement.textContent = reactionCount;

        }).catch(function(error) {
            console.log(error.response.data);
        });
    }
</script>
