@extends('user.layouts.main')

@section('title', 'My Registered Events')

@section('content')

@php
    $status = request('status', 'upcoming');
    $sort = request('sort', 'registration');
@endphp

<section class="min-h-screen bg-slate-50 pb-16 pt-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">

        <!-- ================= HEADER ================= -->
        <div class="mb-6">
            <h1 class="text-2xl text-shadow font-extrabold text-slate-900 md:text-3xl">
                My Registered Events
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Manage your research event schedule, check-in for attendance, and provide feedback surveys.
            </p>
        </div>

        <!-- ================= TAB & SORT ================= -->
        <div class="mb-6 rounded-2xl border border-slate-200 bg-white px-5 pt-4 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <!-- TABS -->
                <div class="flex items-center gap-6 overflow-x-auto">

                    <a href="{{ url('/my-event?status=upcoming&sort='.$sort) }}"
                       class="flex shrink-0 items-center gap-2 border-b-2 pb-3 text-sm font-semibold no-underline! transition
                       {{ $status === 'upcoming'
                            ? 'border-blue-600 text-blue-600!'
                            : 'border-transparent text-slate-500! hover:text-blue-600!' }}">

                        Upcoming Events

                        <span class="rounded-full px-2 py-0.5 text-xs font-bold
                            {{ $status === 'upcoming'
                                ? 'bg-blue-50 text-blue-600'
                                : 'bg-slate-100 text-slate-500' }}">
                            3
                        </span>
                    </a>

                    <a href="{{ url('/my-event?status=past&sort='.$sort) }}"
                       class="flex shrink-0 items-center gap-2 border-b-2 pb-3 text-sm font-semibold no-underline! transition
                       {{ $status === 'past'
                            ? 'border-blue-600 text-blue-600!'
                            : 'border-transparent text-slate-500! hover:text-blue-600!' }}">

                        Past Seminars

                        <span class="rounded-full px-2 py-0.5 text-xs font-bold
                            {{ $status === 'past'
                                ? 'bg-blue-50 text-blue-600'
                                : 'bg-slate-100 text-slate-500' }}">
                            8
                        </span>
                    </a>

                </div>

                <!-- SORT -->
                <form action="{{ url('/my-event') }}" method="GET" class="mb-3 flex w-full items-center gap-2 sm:w-auto">

                    <input type="hidden" name="status" value="{{ $status }}">

                    <span class="hidden text-xs font-medium text-slate-500 sm:block">
                        Sort:
                    </span>

                    <select name="sort"
                            class="h-10 flex-1 cursor-pointer rounded-xl border border-slate-200 bg-slate-50 px-4 text-sm  text-slate-700 outline-none transition hover:border-blue-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 sm:flex-none">

                        <option value="registration" {{ $sort === 'registration' ? 'selected' : '' }}>
                            Registration Date
                        </option>

                        <option value="date" {{ $sort === 'date' ? 'selected' : '' }}>
                            Event Date
                        </option>

                        <option value="name" {{ $sort === 'name' ? 'selected' : '' }}>
                            Event Name
                        </option>

                    </select>

                    <button type="submit"
                            class="h-10 rounded-xl! bg-blue-600 px-5 text-sm  text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                        Apply
                    </button>

                </form>

            </div>
        </div>

        <!-- ================= TABLE ================= -->
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full border-collapse">

                    <!-- TABLE HEAD -->
                    <thead class="bg-slate-100">
                        <tr class="text-left text-xs font-bold  tracking-wide text-slate-500">

                            <th class="w-2/5 px-5 py-4">
                                Event Details
                            </th>

                            <th class="whitespace-nowrap px-5 py-4">
                                Date & Time
                            </th>

                            <th class="whitespace-nowrap px-5 py-4">
                                Venue
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-center">
                                Status
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-right text-center">
                                Actions
                            </th>

                        </tr>
                    </thead>

                    <!-- ================= UPCOMING ================= -->
                    @if($status === 'upcoming')

                    <tbody class="divide-y divide-slate-100">

                        <!-- ROW 1 -->
                        <tr class="group transition hover:bg-blue-50/40">

                            <td class="px-5 py-5">
                                <div class="min-w-64">
                                    <span class="inline-flex rounded-full bg-blue-50 px-2.5 py-1 text-xs! font-semibold  text-blue-600">
                                        Technical Workshop
                                    </span>

                                    <h3 class="mt-2 text-xl! font-bold leading-5 text-slate-900 transition group-hover:text-blue-600 sm:text-base">
                                        AI Acceleration for Future Scientific Research
                                    </h3>
                                </div>
                            </td>

                            <td class="whitespace-nowrap px-5 py-5 align-middle">
                                <p class="text-sm font-semibold text-slate-900">
                                    24 May 2025
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    09:00 - 15:00 WIB
                                </p>
                            </td>

                            <td class="px-5 py-5 align-middle">
                                <div class="min-w-32">
                                    <span class="inline-flex rounded-lg bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                        Online
                                    </span>

                                    <p class="mt-1.5 text-xs text-slate-500">
                                        Online (Zoom)
                                    </p>
                                </div>
                            </td>

                            <td class="px-5 py-5 align-middle">
                                <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-600">
                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                    Confirmed
                                </span>
                            </td>

                            <td class="px-5 py-5 align-middle">
                                <div class="flex justify-end gap-2">

                                    <a href="#"
                                       class="inline-flex h-9 items-center justify-center whitespace-nowrap rounded-xl bg-blue-600 px-4 text-xs font-semibold text-white no-underline! shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md">
                                        View Ticket
                                    </a>

                                    <button class="h-9 whitespace-nowrap rounded-xl! border border-slate-200 bg-white px-4 text-xs font-semibold text-slate-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-500">
                                        Cancel
                                    </button>

                                </div>
                            </td>

                        </tr>

                        <!-- ROW 2 -->
                        <tr class="group transition hover:bg-blue-50/40">

                            <td class="px-5 py-5">
                                <div class="min-w-64">
                                    <span class="inline-flex rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold  text-blue-600">
                                        Policy Symposium
                                    </span>

                                    <h3 class="mt-2 text-xl! font-bold leading-5 text-slate-900 transition group-hover:text-blue-600 sm:text-base">
                                        BRIN Environment Policy Analysis & Green Tech Talk
                                    </h3>
                                </div>
                            </td>

                            <td class="whitespace-nowrap px-5 py-5 align-middle">
                                <p class="text-sm font-semibold text-slate-900">
                                    20 May 2025
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    13:00 - 17:00 WIB
                                </p>
                            </td>

                            <td class="px-5 py-5 align-middle">
                                <div class="min-w-32">
                                    <span class="inline-flex rounded-lg bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                        Offline
                                    </span>

                                    <p class="mt-1.5 text-xs text-slate-500">
                                        Jakarta, Kampus BRIN
                                    </p>
                                </div>
                            </td>

                            <td class="px-5 py-5 align-middle">
                                <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-600">
                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                    Confirmed
                                </span>
                            </td>

                            <td class="px-5 py-5 align-middle">
                                <div class="flex justify-end gap-2">

                                    <a href="#"
                                       class="inline-flex h-9 items-center justify-center whitespace-nowrap rounded-xl bg-blue-600 px-4 text-xs font-semibold text-white no-underline! shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md">
                                        View Ticket
                                    </a>

                                    <button class="h-9 whitespace-nowrap rounded-xl! border border-slate-200 bg-white px-4 text-xs font-semibold text-slate-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-500">
                                        Cancel
                                    </button>

                                </div>
                            </td>

                        </tr>

                        <!-- ROW 3 -->
                        <tr class="group transition hover:bg-blue-50/40">

                            <td class="px-5 py-5">
                                <div class="min-w-64">
                                    <span class="inline-flex rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold  text-blue-600">
                                        Scientific Conference
                                    </span>

                                    <h3 class="mt-2 text-xl! font-bold leading-5 text-slate-900 transition group-hover:text-blue-600 sm:text-base">
                                        International Symposium on Nusantara Marine Biodiversity
                                    </h3>
                                </div>
                            </td>

                            <td class="whitespace-nowrap px-5 py-5 align-middle">
                                <p class="text-sm font-semibold text-slate-900">
                                    12 June 2025
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    08:00 - 18:00 WIB
                                </p>
                            </td>

                            <td class="px-5 py-5 align-middle">
                                <div class="min-w-32">
                                    <span class="inline-flex rounded-lg bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                        Offline
                                    </span>

                                    <p class="mt-1.5 text-xs text-slate-500">
                                        Bali, Indonesia
                                    </p>
                                </div>
                            </td>

                            <td class="px-5 py-5 align-middle">
                                <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-600">
                                    <span class="size-1.5 rounded-full bg-amber-500"></span>
                                    Pending
                                </span>
                            </td>

                            <td class="px-5 py-5 align-middle">
                                <div class="flex justify-end gap-2">

                                    <a href="#"
                                       class="inline-flex h-9 items-center justify-center whitespace-nowrap rounded-xl bg-blue-600 px-4 text-xs font-semibold text-white no-underline! shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md">
                                        View Ticket
                                    </a>

                                    <button class="h-9 whitespace-nowrap rounded-xl! border border-slate-200 bg-white px-4 text-xs font-semibold text-slate-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-500">
                                        Cancel
                                    </button>

                                </div>
                            </td>

                        </tr>

                    </tbody>


                    <!-- ================= PAST ================= -->
                    @else

                    <tbody class="divide-y divide-slate-100">

                        <!-- PAST 1 -->
                        <tr class="group transition hover:bg-blue-50/40">

                            <td class="px-5 py-5">
                                <div class="min-w-64">
                                    <span class="inline-flex rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold  text-blue-600">
                                        Technical Workshop
                                    </span>

                                    <h3 class="mt-2 text-xl! font-bold leading-5 text-slate-900 transition group-hover:text-blue-600 sm:text-base">
                                        AI Acceleration for Future Scientific Research
                                    </h3>
                                </div>
                            </td>

                            <td class="whitespace-nowrap px-5 py-5">
                                <p class="text-sm font-semibold text-slate-900">
                                    24 May 2025
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    09:00 - 15:00 WIB
                                </p>
                            </td>

                            <td class="px-5 py-5">
                                <div class="min-w-32">
                                    <span class="inline-flex rounded-lg bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                        Online
                                    </span>

                                    <p class="mt-1.5 text-xs text-slate-500">
                                        Online (Zoom)
                                    </p>
                                </div>
                            </td>

                            <td class="px-5 py-5">
                                <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                                    <span class="size-1.5 rounded-full bg-slate-400"></span>
                                    Completed
                                </span>
                            </td>

                            <td class="px-5 py-5">
                                <div class="flex justify-end gap-2">

                                    <a href="#"
                                       class="inline-flex h-9 items-center justify-center whitespace-nowrap rounded-xl bg-blue-600 px-4 text-xs font-semibold text-white no-underline! shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md">
                                        Isi Survey
                                    </a>

                                </div>
                            </td>

                        </tr>

                        <!-- PAST 2 -->
                        <tr class="group transition hover:bg-blue-50/40">

                            <td class="px-5 py-5">
                                <div class="min-w-64">
                                    <span class="inline-flex rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold  text-blue-600">
                                        Policy Symposium
                                    </span>

                                    <h3 class="mt-2 text-xl! font-bold leading-5 text-slate-900 transition group-hover:text-blue-600 sm:text-base">
                                        BRIN Environment Policy Analysis & Green Tech Talk
                                    </h3>
                                </div>
                            </td>

                            <td class="whitespace-nowrap px-5 py-5">
                                <p class="text-sm font-semibold text-slate-900">
                                    20 May 2025
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    13:00 - 17:00 WIB
                                </p>
                            </td>

                            <td class="px-5 py-5">
                                <div class="min-w-32">
                                    <span class="inline-flex rounded-lg bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                        Offline
                                    </span>

                                    <p class="mt-1.5 text-xs text-slate-500">
                                        Jakarta, Kampus BRIN
                                    </p>
                                </div>
                            </td>

                            <td class="px-5 py-5">
                                <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                                    <span class="size-1.5 rounded-full bg-slate-400"></span>
                                    Completed
                                </span>
                            </td>

                            <td class="px-5 py-5">
                                <div class="flex justify-end gap-2">

                                    <a href="#"
                                       class="inline-flex h-9 items-center justify-center whitespace-nowrap rounded-xl bg-blue-600 px-4 text-xs font-semibold text-white no-underline! shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md">
                                        Isi Survey
                                    </a>

                                </div>
                            </td>

                        </tr>

                    </tbody>

                    @endif

                </table>

            </div>
        </div>

        <!-- ================= PAGINATION ================= -->
        <div class="mt-6 flex flex-col items-center justify-between gap-4 sm:flex-row">

            <p class="m-0 text-xs text-slate-500">
                Showing {{ $status === 'upcoming' ? '1–3 of 3' : '1–2 of 8' }} registered events
            </p>

            <div class="flex items-center gap-2">

                <button class="flex size-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">
                    ‹
                </button>

                <button class="flex size-9 items-center justify-center rounded-xl bg-blue-600 text-sm font-semibold text-white shadow-sm">
                    1
                </button>

                @if($status === 'past')

                <button class="flex size-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-sm text-slate-600 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">
                    2
                </button>

                <button class="flex size-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-sm text-slate-600 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">
                    3
                </button>

                @endif

                <button class="flex size-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">
                    ›
                </button>

            </div>
        </div>

    </div>
</section>

@endsection
