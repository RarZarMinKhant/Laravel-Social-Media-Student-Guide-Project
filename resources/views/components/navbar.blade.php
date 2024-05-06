<nav
    class="sticky top-0 z-10 block w-full max-w-full px-4 py-2 text-black bg-white border rounded-none shadow-md h-max border-white/80 bg-opacity-80 backdrop-blur-2xl backdrop-saturate-200 lg:px-8 lg:py-4">
    <div class="flex items-center justify-between text-blue-gray-900">
        <a href="/"
            class="mr-4 block cursor-pointer py-1.5 font-sans text-base font-medium leading-relaxed text-inherit antialiased">
            Social-Media
        </a>
        <div class="flex items-center gap-4">
            <div class="hidden mr-4 lg:block">
                <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                    <li class="block p-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        <a href="#" class="flex items-center">
                            Home
                        </a>
                    </li>
                    <li class="block p-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        <a href="#" class="flex items-center">
                            Friends
                        </a>
                    </li>
                    <li class="block p-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        <a href="#" class="flex items-center">
                            Setting
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-x-1">
                @auth
                    <a class="text-black" href="{{ route('blog.create') }}">
                        <button>Create Blog</button>
                    </a>
                    <a href="{{ route('profile', auth()->user()?->username) }}"><img
                            src="https://icon2.cleanpng.com/20180523/wxj/kisspng-businessperson-computer-icons-avatar-clip-art-lattice-5b0508dc2ee812.2252011515270566041921.jpg"
                            class="w-10 h-10 rounded-full">
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="rounded-lg bg-red-500 py-2 px-4 text-center font-sans text-xs font-bold uppercase text-white">
                            Log Out
                        </button>
                    </form>
                @else
                    <button
                        class="rounded-lg bg-black py-2 px-4 text-center font-sans text-xs font-bold uppercase text-white"
                        type="button">
                        <span>Login</span>
                    </button>
                @endauth
            </div>
        </div>
    </div>
</nav>
