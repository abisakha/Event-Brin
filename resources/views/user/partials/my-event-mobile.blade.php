<div class="sm:hidden">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="text-shadow text-xl! font-extrabold text-slate-900">
            My Registered Events
        </h1>
        <p class="mt-1 text-[10px]! leading-4 text-slate-500">
            Manage your research event schedule, check-in for attendance, and provide feedback surveys.
        </p>
    </div>

    <!-- Tabs -->
    <div class="mb-3 grid grid-cols-2 rounded-xl border border-slate-200 bg-white p-1 shadow-sm">
        <a href="{{ url('/my-event?status=upcoming&sort='.$sort) }}" class="flex items-center justify-center gap-1.5 rounded-lg px-3 py-2 text-[10px]! font-semibold no-underline! transition {{ $status==='upcoming' ? 'bg-blue-600 text-white!' : 'text-slate-500! hover:bg-slate-50' }}">
            Upcoming
            <span class="rounded-full px-1.5 py-0.5 text-[8px]! {{ $status==='upcoming' ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-500' }}">
                {{ $upcomingTotal }}
            </span>
        </a>

        <a href="{{ url('/my-event?status=past&sort='.$sort) }}" class="flex items-center justify-center gap-1.5 rounded-lg px-3 py-2 text-[10px]! font-semibold no-underline! transition {{ $status==='past' ? 'bg-blue-600 text-white!' : 'text-slate-500! hover:bg-slate-50' }}">
            Past
            <span class="rounded-full px-1.5 py-0.5 text-[8px]! {{ $status==='past' ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-500' }}">
                {{ $pastTotal }}
            </span>
        </a>
    </div>

    <!-- Sort -->
    <form action="{{ url('/my-event') }}" method="GET" class="mb-4">
        <input type="hidden" name="status" value="{{ $status }}">
        <div class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white p-2 shadow-sm">
            <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 4h13M3 8h9M3 12h5m8-8v16m0 0-4-4m4 4 4-4"/>
                </svg>
            </div>

            <div class="min-w-0 flex-1">
                <p class="text-[8px]! text-slate-400">Sort by</p>
                <select name="sort" onchange="this.form.submit()" class="w-full cursor-pointer bg-transparent p-0 text-[10px]! font-semibold text-slate-700 outline-none">
                    <option value="registration" {{ $sort==='registration' ? 'selected' : '' }}>Registration Date</option>
                    <option value="date" {{ $sort==='date' ? 'selected' : '' }}>Event Date</option>
                    <option value="name" {{ $sort==='name' ? 'selected' : '' }}>Event Name</option>
                </select>
            </div>
        </div>
    </form>

    <!-- Cards -->
    <div class="space-y-3">
        @foreach($events as $event)
            <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:border-blue-200 hover:shadow-md">
                <div class="p-3">
                    <div class="mb-2 flex items-center justify-between gap-2">
                        <span class="max-w-40 truncate rounded-full bg-blue-50 px-2.5 py-1 text-[8px]! font-semibold text-blue-600">
                            {{ $event['category'] }}
                        </span>

                        @if($event['status_type']==='confirmed')
                            <span class="inline-flex shrink-0 items-center gap-1 rounded-full bg-emerald-50 px-2 py-1 text-[8px]! font-semibold text-emerald-600">
                                <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                {{ $event['status'] }}
                            </span>
                        @elseif($event['status_type']==='pending')
                            <span class="inline-flex shrink-0 items-center gap-1 rounded-full bg-amber-50 px-2 py-1 text-[8px]! font-semibold text-amber-600">
                                <span class="size-1.5 rounded-full bg-amber-500"></span>
                                {{ $event['status'] }}
                            </span>
                        @else
                            <span class="inline-flex shrink-0 items-center gap-1 rounded-full bg-slate-100 px-2 py-1 text-[8px]! font-semibold text-slate-600">
                                <span class="size-1.5 rounded-full bg-slate-400"></span>
                                {{ $event['status'] }}
                            </span>
                        @endif
                    </div>

                    <h3 class="line-clamp-2 text-[13px]! font-bold leading-4 text-slate-900">
                        {{ $event['title'] }}
                    </h3>

                    <div class="mt-3 space-y-2">
                        <div class="flex items-center gap-2">
                            <div class="flex size-6 shrink-0 items-center justify-center rounded-lg bg-slate-50 text-slate-500">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2Z"/>
                                </svg>
                            </div>
                            <span class="text-[9px]! font-medium text-slate-600">
                                {{ $event['date'] }}
                            </span>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="flex size-6 shrink-0 items-center justify-center rounded-lg bg-slate-50 text-slate-500">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0Z"/>
                                </svg>
                            </div>
                            <span class="text-[9px]! text-slate-500">
                                {{ $event['time'] }}
                            </span>
                        </div>

                        <div class="flex min-w-0 items-center gap-2">
                            <div class="flex size-6 shrink-0 items-center justify-center rounded-lg bg-slate-50 text-slate-500">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s7-4.35 7-11a7 7 0 10-14 0c0 6.65 7 11 7 11Z"/>
                                    <circle cx="12" cy="10" r="2.5"/>
                                </svg>
                            </div>

                            <div class="flex min-w-0 items-center gap-1.5">
                                <span class="shrink-0 rounded-full bg-blue-50 px-2 py-1 text-[8px]! font-semibold text-blue-600">
                                    {{ $event['format'] }}
                                </span>
                                <span class="truncate text-[9px]! text-slate-500">
                                    {{ $event['venue'] }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 grid {{ $status==='upcoming' ? 'grid-cols-2' : 'grid-cols-1' }} gap-2">
                        @if($status==='upcoming')
                            <a href="#" class="flex h-8 items-center justify-center rounded-xl bg-blue-600 px-2 text-[9px]! font-semibold text-white no-underline! shadow-sm transition hover:bg-blue-700">
                                View Ticket
                            </a>
                            <button class="h-8 rounded-xl! border border-slate-200 bg-white px-2 text-[9px]! font-semibold text-slate-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-500">
                                Cancel
                            </button>
                        @else
                            <a href="#" class="flex h-8 items-center justify-center rounded-xl bg-blue-600 px-2 text-[9px]! font-semibold text-white no-underline! shadow-sm transition hover:bg-blue-700">
                                Isi Survey
                            </a>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex items-center justify-between gap-3">
        <p class="m-0 text-[8px]! text-slate-500">
            Showing {{ $status==='upcoming' ? '1–3 of 3' : '1–2 of 8' }}
        </p>

        <div class="flex items-center gap-1.5">
            <button class="flex size-7 items-center justify-center rounded-lg border border-slate-200 bg-white text-[10px]! text-slate-500">
                ‹
            </button>
            <button class="flex size-7 items-center justify-center rounded-lg bg-blue-600 text-[9px]! font-semibold text-white">
                1
            </button>

            @if($status==='past')
                <button class="flex size-7 items-center justify-center rounded-lg border border-slate-200 bg-white text-[9px]! text-slate-600">
                    2
                </button>
                <button class="flex size-7 items-center justify-center rounded-lg border border-slate-200 bg-white text-[9px]! text-slate-600">
                    3
                </button>
            @endif

            <button class="flex size-7 items-center justify-center rounded-lg border border-slate-200 bg-white text-[10px]! text-slate-500">
                ›
            </button>
        </div>
    </div>
</div>
