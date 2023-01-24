<nav class="w-full h-max bg-[#2A3342] text-gray-400">
    <section class="flex sm:mx-4 lg:mx-20 my-4">
        @auth
            <nav class="flex">
                <div x-show="!isOpen()" class="flex">
                    <a x-show="!isOpen()" @click.prevent="handleOpen()" class="p-3 my-auto" href="#">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </a>
                </div>
            </nav>
            <a href="/">
                <img alt="logo" src="{{ asset('images/logo-long.png') }}" class="w-[14rem] my-2 hidden lg:block" />
                <img alt="logo" src="{{ asset('images/logo-short.png') }}" class="w-[4rem] my-2 hidden sm:block lg:hidden" />
            </a>
        @endauth
        @guest
            <a href="/">
                <img alt="logo" src="{{ asset('images/logo-long.png') }}" class="w-[14rem] my-2 hidden lg:block" />
                <img alt="logo" src="{{ asset('images/logo-short.png') }}" class="w-[4rem] my-2  lg:hidden" />
            </a>
        @endguest
        <div class="mx-auto"></div>
        @guest
            <a href="/login" class="hover:text-gray-200 font-black">
                <span>Login</span>
            </a>
            <a href="/register"
                class="bg-[#F77F00] hover:bg-[#e07400] text-white hover:text-gray-200 font-black rounded-lg px-4 py-3">
                <span>Sign Up</span>
            </a>
        @endguest
        @auth
            <span class="w-max hover:text-gray-200 text-white font-black my-auto">Hello, {{ auth()->user()->name }}</span>
            <form action="/logout" method="POST" class="my-auto">
                @csrf
                <button
                    class="bg-[#F77F00] hover:bg-[#e07400] text-white hover:text-gray-200 font-black rounded-lg px-4 py-3"
                    type="submit">
                    <span class="flex font-semibold">Logout</span>
                </button>
            </form>
        @endauth
    </section>
</nav>
