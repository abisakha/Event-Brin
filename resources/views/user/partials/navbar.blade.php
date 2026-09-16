@php
    $isHome=request()->is('/');

    // DUMMY EVENT SEARCH - BACKEND LATER
    $searchEvents=[
        ['id'=>1,'title'=>'National Research Innovation Summit 2026'],
        ['id'=>2,'title'=>'Artificial Intelligence Research Conference'],
        ['id'=>3,'title'=>'BRIN Technology Innovation Forum'],
        ['id'=>4,'title'=>'Marine and Climate Research Workshop'],
        ['id'=>5,'title'=>'National Space Research Seminar'],
        ['id'=>6,'title'=>'Research and Innovation Collaboration Forum for Sustainable Development 2026']
    ];
@endphp

{{-- navbar --}}
<header id="navbar" data-home="{{ $isHome ? 'true' : 'false' }}" class="fixed top-4 left-1/2 z-50 w-11/12 -translate-x-1/2 rounded-full px-4 py-2 transition-all duration-300 sm:px-6 lg:px-8 {{ $isHome ? 'border-transparent bg-transparent shadow-none' : 'border-slate-200 bg-white shadow-xl shadow-slate-900/10 backdrop-blur-md' }}">
    <div class="grid min-h-10 grid-cols-12 items-center gap-2 sm:gap-3">

        <!-- BRAND -->
        <div class="col-span-3">
            <a href="{{ url('/') }}" class="inline-flex no-underline!">
                <img src="{{ asset('assets/images/logo.png') }}" class="max-h-10 w-20 object-contain sm:w-24 lg:w-28" alt="BRIN">
            </a>
        </div>

        <!-- SEARCH -->
        <div class="col-span-5 sm:col-span-5 lg:col-span-3">
            <div id="eventSearchWrapper" class="relative w-full">

               <input
                    id="eventSearchInput"
                    type="text"
                    autocomplete="off"
                    placeholder="Search events..."
                    class="h-8 w-full rounded-full border border-gray-200 bg-white/40 px-3 pt-0 pb-1 pr-8 text-[10px] leading-none text-gray-700 outline-none transition-all duration-300 placeholder:text-[10px] placeholder:text-gray-500 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 sm:h-9 sm:px-5 sm:py-0 sm:pr-10 sm:text-sm sm:leading-normal sm:placeholder:text-sm"
                >

                <img src="{{ asset('assets/images/search.png') }}" class="pointer-events-none absolute right-2.5 top-1/2 w-3.5 -translate-y-1/2 object-contain sm:right-4 sm:w-4" alt="Search">

                <!-- SEARCH SUGGESTION -->
                <div id="eventSearchSuggestion" class="absolute left-1/2 top-full z-50 mt-3 hidden w-60 -translate-x-1/2 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xl shadow-slate-900/10 sm:left-0 sm:w-72 sm:translate-x-0 lg:w-80">

                    <!-- HEADER -->
                    <div class="flex items-center justify-between border-b border-slate-100 px-4 py-3">
                        <p class="truncate text-xs font-semibold text-slate-600">
                            Event Suggestions
                        </p>

                        <span id="eventSuggestionCount" class="ml-2 shrink-0 rounded-full bg-slate-100 px-2 py-0.5 text-xs font-semibold text-slate-500">
                            {{ count($searchEvents) }}
                        </span>
                    </div>

                    <!-- LIST -->
                    <div class="max-h-64 overflow-y-auto p-1.5">
                        @foreach($searchEvents as $event)
                            <a
                                href="{{ url('/event/'.$event['id']) }}"
                                data-event-suggestion
                                data-title="{{ strtolower($event['title']) }}"
                                title="{{ $event['title'] }}"
                                class="group block min-w-0 rounded-lg px-3 py-2.5 no-underline! transition duration-200 hover:bg-blue-50"
                            >
                                <p class="truncate text-xs font-semibold text-slate-700 transition group-hover:text-blue-600 sm:text-sm">
                                    {{ $event['title'] }}
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Event
                                </p>
                            </a>
                        @endforeach

                        <!-- EMPTY STATE -->
                        <div id="eventSearchEmpty" class="hidden px-4 py-7 text-center">
                            <p class="text-xs font-semibold text-slate-600">
                                Event not found
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Try another event title
                            </p>
                        </div>
                    </div>
                </div>
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

                <!-- MY EVENT -->
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
        <div class="{{ auth()->check() ? 'col-span-4 sm:col-span-4 lg:col-span-2' : 'col-span-4 sm:col-span-4 lg:col-span-1' }} flex items-center justify-end">

            {{-- @guest
                <div class="relative -top-1">
                    <a href="{{ url('/login') }}" class="inline-flex h-9 items-center justify-center whitespace-nowrap rounded-full px-4 text-xs font-semibold bg-transparent! text-gray-900! no-underline! transition-all duration-300 hover:-translate-y-1 hover:bg-blue-600! hover:text-white! hover:shadow-md active:scale-95 sm:text-sm">
                        Sign in
                    </a>
                </div>
            @endguest --}}

            {{-- @auth --}}
            <div class="relative -top-1 flex flex-nowrap items-center gap-1 sm:gap-2">

                <!-- NOTIFICATION -->
                <a href="{{ url('/notification') }}" class="relative flex size-8 shrink-0 items-center justify-center rounded-full bg-slate-50 text-slate-600 no-underline! transition duration-300 hover:bg-blue-600 hover:text-white! hover:shadow-md sm:size-9">
                    <svg class="size-4 sm:size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14.857 17H9.143m8.714 0H19l-1.5-2.25V10a5.5 5.5 0 00-11 0v4.75L5 17h1.143m8.714 0a3 3 0 01-5.714 0"/>
                    </svg>

                    <span class="absolute right-1 top-1 size-2 rounded-full border border-white bg-red-500 sm:right-1.5 sm:top-1.5"></span>
                </a>

                <!-- PROFILE -->
                <details class="group relative shrink-0">
                    <summary class="cursor-pointer list-none">
                        <span class="inline-flex h-9 items-center gap-2 whitespace-nowrap rounded-full px-1 transition duration-200 hover:bg-slate-100 sm:px-2">

                            <span class="flex size-7 shrink-0 items-center justify-center rounded-full bg-blue-100 text-xs font-semibold text-blue-600">
                                A
                            </span>

                            <span class="hidden shrink-0 whitespace-nowrap text-xs font-medium text-slate-700 sm:block">
                                Agus P
                            </span>

                            <svg class="hidden size-3.5 shrink-0 text-slate-400 transition duration-200 group-open:rotate-180 sm:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </span>
                    </summary>

                    <!-- PROFILE DROPDOWN -->
                    <div class="absolute right-0 top-full z-50 mt-2 w-52 overflow-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl">

                        <!-- VIEW PROFILE -->
                        <a href="{{ url('/profile') }}" class="group/item flex items-center gap-3 rounded-lg px-3 py-2.5 no-underline! transition hover:bg-blue-50">

                            <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500 transition group-hover/item:bg-blue-100 group-hover/item:text-blue-600">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0ZM4.5 20.25a7.5 7.5 0 0115 0"/>
                                </svg>
                            </div>

                            <span class="min-w-0 flex-1 whitespace-nowrap text-sm font-medium text-slate-600 transition group-hover/item:text-blue-600">
                                View Profile
                            </span>
                        </a>

                        <!-- ADMIN DASHBOARD -->
                        {{-- @if(auth()->check() && auth()->user()->role === 'admin') --}}
                        <a href="{{ url('/dashboard') }}" class="group/item flex items-center gap-3 rounded-lg px-3 py-2.5 no-underline! transition hover:bg-blue-50">

                            <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500 transition group-hover/item:bg-blue-100 group-hover/item:text-blue-600">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 3h7v7H3V3Zm11 0h7v7h-7V3ZM3 14h7v7H3v-7Zm11 0h7v7h-7v-7Z"/>
                                </svg>
                            </div>

                            <span class="min-w-0 flex-1 whitespace-nowrap text-sm font-medium text-slate-600 transition group-hover/item:text-blue-600">
                                Admin Dashboard
                            </span>
                        </a>
                        {{-- @endif --}}

                        <div class="my-1 border-t border-slate-100"></div>

                        <!-- LOGOUT -->
                        {{--
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                        --}}

                        <button type="button" class="group/item flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left transition hover:bg-red-50">

                            <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500 transition group-hover/item:bg-red-100 group-hover/item:text-red-500">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3H9m9.75 0-3-3m3 3-3 3"/>
                                </svg>
                            </div>

                            <span class="whitespace-nowrap text-sm font-medium text-red-500">
                                Logout
                            </span>
                        </button>

                        {{-- </form> --}}
                    </div>
                </details>
            </div>
            {{-- @endauth --}}
        </div>
    </div>
</header>

<!-- ================= MOBILE BOTTOM NAVBAR ================= -->
<nav class="fixed inset-x-0 bottom-0 z-50 border-t border-slate-200 bg-white/95 px-2 pb-2 pt-1.5 shadow-2xl backdrop-blur-lg lg:hidden">
    <div class="mx-auto grid max-w-md grid-cols-4 gap-1">

        <!-- HOME -->
        <a href="{{ url('/') }}" class="flex flex-col items-center justify-center gap-1 rounded-xl py-2 no-underline! transition duration-200 {{ request()->is('/') ? 'bg-blue-50 text-blue-600!' : 'text-slate-500!' }}">
            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 10.5 12 3l9 7.5M5.25 9v11.25h13.5V9M9 20.25v-6h6v6"/>
            </svg>

            <span class="text-xs font-medium">
                Home
            </span>
        </a>

        <!-- EVENTS -->
        <a href="{{ url('/event') }}" class="flex flex-col items-center justify-center gap-1 rounded-xl py-2 no-underline! transition duration-200 {{ request()->is('event*') ? 'bg-blue-50 text-blue-600!' : 'text-slate-500!' }}">
            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 4.5h13.5A1.5 1.5 0 0120.25 6v13.5A1.5 1.5 0 0118.75 21H5.25a1.5 1.5 0 01-1.5-1.5V6a1.5 1.5 0 011.5-1.5Z"/>
            </svg>

            <span class="text-xs font-medium">
                Events
            </span>
        </a>

        <!-- CALENDAR -->
        <a href="{{ url('/calendar') }}" class="flex flex-col items-center justify-center gap-1 rounded-xl py-2 no-underline! transition duration-200 {{ request()->is('calendar*') ? 'bg-blue-50 text-blue-600!' : 'text-slate-500!' }}">
            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6.75 3v2.25M17.25 3v2.25M3.75 9h16.5M5.25 4.5h13.5A1.5 1.5 0 0120.25 6v13.5A1.5 1.5 0 0118.75 21H5.25a1.5 1.5 0 01-1.5-1.5V6a1.5 1.5 0 011.5-1.5Z"/>
            </svg>

            <span class="text-xs font-medium">
                Calendar
            </span>
        </a>

        <!-- MY EVENT -->
        <a href="{{ url('/my-event') }}" class="flex flex-col items-center justify-center gap-1 rounded-xl py-2 no-underline! transition duration-200 {{ request()->is('my-event*') ? 'bg-blue-50 text-blue-600!' : 'text-slate-500!' }}">
            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0ZM4.5 20.25a7.5 7.5 0 0115 0"/>
            </svg>

            <span class="text-xs font-medium">
                My Event
            </span>
        </a>
    </div>
</nav>

