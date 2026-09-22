<!-- Navbar -->
<header class="flex items-center justify-end border-b bg-white px-5 py-4 dark:border-slate-800 dark:bg-slate-900">
    <div class="flex items-center gap-4">
        <button id="themeBtn" type="button" class="rounded-full border p-2 transition duration-500 hover:rotate-180 dark:border-slate-700">
            <i id="themeIcon" data-lucide="moon" class="h-5 w-5"></i>
        </button>

        <a href="{{ url('/admin/profile') }}" class="flex items-center gap-3 rounded-lg p-1.5 no-underline! transition hover:bg-slate-100 dark:hover:bg-slate-800">
                <span class="flex size-7 shrink-0 items-center justify-center rounded-full bg-blue-100 text-xs font-semibold text-blue-600">
                    {{ mb_strtoupper(mb_substr(auth()->user()->name ?? '',0,1)) }}
                </span>
            <div class="hidden text-left md:block">
                <p class="text-sm font-semibold text-slate-900 dark:text-white">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-xs text-slate-500 dark:text-slate-400">
                    Event Coordinator
                </p>
            </div>
        </a>
    </div>
</header>
