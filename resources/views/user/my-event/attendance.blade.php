@extends('user.layouts.main')

@section('title', 'Session Attendance & Check-In')

@section('content')
<section class="min-h-screen bg-white pb-10 pt-29">
    <div class="mx-auto w-11/12 max-w-6xl">

        {{-- Breadcrumb --}}
        <nav class="mb-1 flex flex-wrap items-center gap-2 text-xs text-slate-500">
            <a href="{{ url('/my-event') }}" class="font-medium text-blue-600! no-underline! hover:text-blue-700!">My Events</a>
            <span>›</span>
            <a href="#" class="max-w-48 truncate text-slate-500! no-underline! hover:text-blue-600! sm:max-w-none">AI Acceleration for Future Scientific Research</a>
            <span>›</span>
            <span class="font-semibold text-slate-800">Attendance</span>
        </nav>

        {{-- Header --}}
        <div class="flex flex-col gap-3 border-b border-blue-500 pb-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="m-0 text-shadow text-2xl! font-bold tracking-tight text-slate-900 sm:text-3xl!">
                    Session Attendance & Check-In
                </h1>
                <p class="mt-1 text-xs text-slate-500 sm:text-sm">
                    Verify your attendance by scanning the QR code provided at the event venue.
                </p>
            </div>

            <span class="inline-flex w-fit shrink-0 items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-600">
                <span class="size-1.5 rounded-full bg-emerald-500"></span>
                Active Session
            </span>
        </div>

        {{-- Content --}}
        <div class="mt-3">
            <h2 class="mb-4 text-xl! font-bold text-slate-900">
                Event Session & Attendance
            </h2>

            <div class="grid gap-4 lg:grid-cols-12">

                {{-- QR Card --}}
                <div class="lg:col-span-3">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-md">

                        <div class="flex items-center justify-between gap-2">
                            <h3 class="m-0 text-base! font-bold text-slate-900">
                                QR Check-In
                            </h3>

                            <span class="shrink-0 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-600">
                                OPEN
                            </span>
                        </div>

                        {{-- QR Placeholder --}}
                        <div class="mx-auto mt-5 flex size-32 items-center justify-center rounded-xl border border-slate-200 bg-white p-4 sm:size-36">
                            <svg viewBox="0 0 120 120" class="size-full text-slate-800" fill="none" stroke="currentColor" stroke-width="4">
                                <rect x="8" y="8" width="30" height="30" rx="4"/>
                                <rect x="82" y="8" width="30" height="30" rx="4"/>
                                <rect x="8" y="82" width="30" height="30" rx="4"/>
                                <path d="M55 8h8M55 23h5M55 38h18M48 52h18v18H48M82 52h8M102 52h10M82 70h30M55 82v8M55 103v9M70 82h12M70 98h8M92 92v20M108 92h4"/>
                            </svg>
                        </div>

                        <p class="mx-auto mt-4 max-w-56 text-center text-xs leading-relaxed text-slate-500">
                            Scan the QR code at the event venue to record your attendance.
                        </p>
                    </div>
                </div>

                {{-- Right Content --}}
                <div class="space-y-4 lg:col-span-9">

                    {{-- Event Information --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-md sm:p-5">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                            <div class="min-w-0">
                                <p class="mb-1 text-xs font-semibold uppercase text-blue-600">
                                    Check-In Now Open
                                </p>

                                <h3 class="m-0 text-base! font-bold leading-snug text-slate-900 sm:text-lg!">
                                    Roundtable Panel: Funding & Collaborations at BRIN
                                </h3>

                                <div class="mt-2 flex flex-wrap gap-x-5 gap-y-1 text-xs text-slate-500">
                                    <span>14:45 - 15:45 WIB</span>
                                    <span>BRIN Auditorium</span>
                                </div>
                            </div>

                            <span class="inline-flex w-fit shrink-0 items-center gap-2 rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-600">
                                <span class="size-1.5 rounded-full bg-blue-500"></span>
                                Waiting for Check-In
                            </span>
                        </div>
                    </div>

                    {{-- Instructions --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-md sm:p-5">

                        <div class="mb-4">
                            <h3 class="m-0 text-base! font-bold text-slate-900 sm:text-lg!">
                                Check-In Instructions
                            </h3>

                            <p class="mt-1 text-xs text-slate-500">
                                Follow the steps below to complete your attendance.
                            </p>
                        </div>

                        <div class="space-y-3">

                           <div class="space-y-2">

                        {{-- Step 1 --}}
                        <div class="flex items-start gap-3 rounded-xl bg-slate-50 p-2.5">
                            <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-xs font-bold text-blue-600">
                                1
                            </div>

                            <div>
                                <h4 class="m-0 text-sm! font-semibold text-slate-800">Scan the QR Code</h4>
                                <p class="mt-0.5 text-xs leading-relaxed text-slate-500">
                                    Scan the QR code provided at the event entrance using your registered account.
                                </p>
                            </div>
                        </div>

                        {{-- Step 2 --}}
                        <div class="flex items-start gap-3 rounded-xl bg-slate-50 p-2.5">
                            <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-xs font-bold text-blue-600">
                                2
                            </div>

                            <div>
                                <h4 class="m-0 text-sm! font-semibold text-slate-800">Confirm Your Attendance</h4>
                                <p class="mt-0.5 text-xs leading-relaxed text-slate-500">
                                    Make sure your attendance status changes to confirmed after the QR code is successfully scanned.
                                </p>
                            </div>
                        </div>

                        {{-- Step 3 --}}
                        <div class="flex items-start gap-3 rounded-xl bg-slate-50 p-2.5">
                            <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-xs font-bold text-blue-600">
                                3
                            </div>

                            <div>
                                <h4 class="m-0 text-sm! font-semibold text-slate-800">Need Assistance?</h4>
                                <p class="mt-0.5 text-xs leading-relaxed text-slate-500">
                                    If the QR code cannot be scanned, please contact the event committee at the registration desk.
                                </p>
                            </div>
                        </div>

                    </div>

                        </div>
                    </div>

                    {{-- Back --}}
                    <div class="flex justify-end">
                        <a href="{{ url('/my-event') }}"
                           class="inline-flex h-9 w-full items-center justify-center rounded-xl bg-blue-600 px-5 text-xs font-semibold text-white! no-underline! shadow-sm transition hover:bg-blue-700! hover:shadow-md sm:w-auto">
                            Back
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
