@php $isHome = request()->is('/'); @endphp

<!-- ================= NAVBAR ================= -->
<header id="navbar" data-home="{{ $isHome ? 'true' : 'false' }}" class="fixed top-4 left-1/2 z-50 w-11/12 -translate-x-1/2 rounded-full  px-4 py-2 transition-all duration-300 sm:px-6 lg:px-8 {{ $isHome ? 'border-transparent bg-transparent shadow-none' : 'border-slate-200 bg-white shadow-xl shadow-slate-900/10 backdrop-blur-md' }}">
    <div class="grid min-h-10 grid-cols-12 items-center gap-3">

        <!-- BRAND -->
        <div class="col-span-3">
            <a href="{{ url('/') }}" class="inline-flex no-underline!">
                <img src="{{ asset('assets/images/logo.png') }}" class="max-h-10 w-20 object-contain sm:w-24 lg:w-28" alt="BRIN">
            </a>
        </div>

        <!-- SEARCH -->
        <div class="col-span-6 sm:col-span-5 lg:col-span-3">
            <div class="relative w-full">
                <input type="text" placeholder="Search events..." class="h-8 w-full rounded-full border border-gray-200 bg-white/40 px-4 pr-9 text-xs text-gray-700 outline-none transition-all duration-300 placeholder:text-gray-500 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 sm:h-9 sm:px-5 sm:pr-10 sm:text-sm">
                <img src="{{ asset('assets/images/search.png') }}" class="absolute right-3 top-1/2 w-3.5 -translate-y-1/2 object-contain sm:right-4 sm:w-4" alt="Search">
            </div>
        </div>

        <!-- MENU -->
        <div class="hidden {{ auth()->check() ? 'lg:col-span-4' : 'lg:col-span-5' }} lg:block">
            <ul class="flex h-9 items-center justify-center gap-6 xl:gap-8">

                <!-- HOME -->
                <li>
                    <a href="{{ url('/') }}" class="group relative flex h-9 items-center text-sm font-medium no-underline! transition duration-300 hover:-translate-y-1 hover:text-blue-600! {{ request()->is('/') ? 'text-blue-600!' : 'text-gray-900!' }}">
                        Home
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300 {{ request()->is('/') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                </li>

                <!-- EVENT -->
                <li>
                    <a href="{{ url('/event') }}" class="group relative flex h-9 items-center text-sm font-medium no-underline! transition duration-300 hover:-translate-y-1 hover:text-blue-600! {{ request()->is('event*') ? 'text-blue-600!' : 'text-gray-900!' }}">
                        Events
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300 {{ request()->is('event*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                </li>

                <!-- CALENDAR -->
                <li>
                    <a href="{{ url('/calendar') }}" class="group relative flex h-9 items-center text-sm font-medium no-underline! transition duration-300 hover:-translate-y-1 hover:text-blue-600! {{ request()->is('calendar*') ? 'text-blue-600!' : 'text-gray-900!' }}">
                        Calendar
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300 {{ request()->is('calendar*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                </li>

                <!-- MY EVENT - HANYA JIKA LOGIN -->
                {{-- @auth --}}
                    <li>
                        <a href="{{ url('/my-event') }}" class="group relative flex h-9 items-center whitespace-nowrap text-sm font-medium no-underline! transition duration-300 hover:-translate-y-1 hover:text-blue-600! {{ request()->is('my-event*') ? 'text-blue-600!' : 'text-gray-900!' }}">
                            My Event
                            <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300 {{ request()->is('my-event*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                        </a>
                    </li>
                {{-- @endauth --}}

            </ul>
        </div>

        <!-- RIGHT SIDE -->
        <div class="{{ auth()->check() ? 'col-span-3 sm:col-span-4 lg:col-span-2' : 'col-span-3 sm:col-span-4 lg:col-span-1' }} flex items-center justify-end">

            {{-- @guest
                <div class="relative -top-1">
                    <a href="{{ url('/login') }}" class="inline-flex h-9 items-center justify-center whitespace-nowrap rounded-full px-4 text-xs font-semibold bg-transparent! text-gray-900! no-underline! transition-all duration-300 hover:-translate-y-1 hover:bg-blue-600! hover:text-white! hover:shadow-md active:scale-95 sm:text-sm">
                        Sign in
                    </a>
                </div>
             @endguest --}}

            {{-- @auth --}}
            <div class="flex items-center relative -top-1 gap-2">

                <!-- NOTIFICATION -->
                <a href="{{ url('/notification') }}" class="relative flex size-9 items-center justify-center rounded-full bg-slate-50 text-slate-600 no-underline! transition duration-300 hover:bg-blue-600 hover:text-white! hover:shadow-md">
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14.857 17H9.143m8.714 0H19l-1.5-2.25V10a5.5 5.5 0 00-11 0v4.75L5 17h1.143m8.714 0a3 3 0 01-5.714 0"/>
                    </svg>

                    <!-- DOT NOTIF -->
                    <span class="absolute right-1.5 top-1.5 size-2 rounded-full border border-white bg-red-500"></span>
                </a>

                <!-- PROFILE -->
                <a href="/profile" class="flex h-9 items-center gap-2 rounded-full bg-slate-100 px-2 pr-3 no-underline! transition duration-300 hover:bg-slate-200 hover:shadow-sm">
                    <div class="flex size-7 shrink-0 items-center justify-center overflow-hidden rounded-full bg-blue-100 text-xs font-bold text-blue-600">
                        A
                    </div>

                    <span class="hidden max-w-20 truncate text-xs font-semibold text-slate-700 xl:block">
                        Agus P
                    </span>
                </a>
                {{-- <a href="{{ url('/profile') }}" class="flex h-9 items-center gap-2 rounded-full bg-slate-100 px-2 pr-3 no-underline! transition duration-300 hover:bg-slate-200 hover:shadow-sm">

                    <!-- AVATAR -->
                    <div class="flex size-7 shrink-0 items-center justify-center overflow-hidden rounded-full bg-blue-100 text-xs font-bold text-blue-600">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <!-- NAME -->
                    <span class="hidden max-w-20 truncate text-xs font-semibold text-slate-700 xl:block">
                        {{ auth()->user()->name }}
                    </span>

                </a> --}}

            </div>
            {{-- @endauth --}}

        </div>

    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');

    if (!navbar || navbar.dataset.home !== 'true') return;

    const updateNavbar = () => {
        const scrolled = window.scrollY > 20;

        navbar.classList.toggle('bg-white', scrolled);
        navbar.classList.toggle('border-slate-200', scrolled);
        navbar.classList.toggle('shadow-xl', scrolled);
        navbar.classList.toggle('shadow-slate-900/10', scrolled);
        navbar.classList.toggle('backdrop-blur-md', scrolled);

        navbar.classList.toggle('bg-transparent', !scrolled);
        navbar.classList.toggle('border-transparent', !scrolled);
        navbar.classList.toggle('shadow-none', !scrolled);
    };

    updateNavbar();
    window.addEventListener('scroll', updateNavbar);
});
</script>
