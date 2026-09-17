@extends('user.layouts.main')
@section('content')
<section class="min-h-screen bg-white pb-10 pt-29 max-sm:pb-24 max-sm:pt-24">
    <div class="mx-auto w-11/12 max-w-6xl max-sm:w-full max-sm:px-3">

        {{-- Breadcrumb --}}
        <nav class="mb-1 flex flex-wrap items-center gap-2 text-xs text-slate-500 max-sm:gap-1.5 max-sm:text-[9px]!">
            <a href="{{ url('/my-event') }}" class="font-medium text-blue-600! no-underline! hover:text-blue-700!">My Events</a>
            <span>›</span>
            <a href="#" class="max-w-48 truncate text-slate-500! no-underline! hover:text-blue-600! sm:max-w-none max-sm:max-w-36">AI Acceleration for Future Scientific Research</a>
            <span>›</span>
            <span class="font-semibold text-slate-800">Attendance</span>
        </nav>

        {{-- Header --}}
        <div class="flex flex-col gap-3 border-b border-blue-500 pb-3 sm:flex-row sm:items-center sm:justify-between max-sm:gap-2 max-sm:pb-2.5">
            <div class="min-w-0">
                <h1 class="m-0 text-shadow text-2xl! font-bold tracking-tight text-slate-900 sm:text-3xl! max-sm:w-full max-sm:truncate max-sm:text-lg! max-sm:leading-6">
                    Session Attendance & Check-In
                </h1>
                <p class="mt-1 text-xs text-slate-500 sm:text-sm max-sm:w-full max-sm:truncate max-sm:text-[9px]! max-sm:leading-4">
                    Verify your attendance by scanning the QR code provided at the event venue.
                </p>
            </div>

            <span class="inline-flex w-fit shrink-0 items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-600 max-sm:gap-1.5 max-sm:px-2.5 max-sm:py-1 max-sm:text-[9px]!">
                <span class="size-1.5 rounded-full bg-emerald-500"></span>
                Active Session
            </span>
        </div>

        {{-- Content --}}
        <div class="mt-3 max-sm:mt-4">
            <h2 class="mb-4 text-xl! font-bold text-slate-900 max-sm:mb-3 max-sm:w-full max-sm:truncate max-sm:text-base!">
                Event Session & Attendance
            </h2>

            <div class="grid gap-4 lg:grid-cols-12 max-sm:gap-3">

                {{-- QR Card --}}
                <div class="min-w-0 lg:col-span-3">
                    <div class="min-w-0 overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-md max-sm:rounded-xl max-sm:p-3">

                        <div class="flex min-w-0 items-center justify-between gap-2">
                            <h3 class="m-0 min-w-0 text-base! font-bold text-slate-900 max-sm:flex-1 max-sm:truncate max-sm:text-sm!">
                                QR Check-In
                            </h3>

                            <span class="shrink-0 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-600 max-sm:px-2 max-sm:py-0.5 max-sm:text-[8px]!">
                                OPEN
                            </span>
                        </div>

                        {{-- QR Placeholder --}}
                        <div class="mx-auto mt-5 flex size-32 items-center justify-center rounded-xl border border-slate-200 bg-white p-4 sm:size-36 max-sm:mt-3 max-sm:size-28 max-sm:rounded-lg max-sm:p-3">
                            <svg viewBox="0 0 120 120" class="size-full text-slate-800" fill="none" stroke="currentColor" stroke-width="4">
                                <rect x="8" y="8" width="30" height="30" rx="4"/>
                                <rect x="82" y="8" width="30" height="30" rx="4"/>
                                <rect x="8" y="82" width="30" height="30" rx="4"/>
                                <path d="M55 8h8M55 23h5M55 38h18M48 52h18v18H48M82 52h8M102 52h10M82 70h30M55 82v8M55 103v9M70 82h12M70 98h8M92 92v20M108 92h4"/>
                            </svg>
                        </div>

                        <p class="mx-auto mt-4 max-w-56 text-center text-xs leading-relaxed text-slate-500 max-sm:mt-3 max-sm:block max-sm:max-w-52 max-sm:truncate max-sm:text-[9px]! max-sm:leading-4">
                            Scan the QR code at the event venue to record your attendance.
                        </p>
                    </div>
                </div>

                {{-- Right Content --}}
                <div class="min-w-0 space-y-4 lg:col-span-9 max-sm:space-y-3">

                    {{-- Event Information --}}
                    <div class="min-w-0 overflow-hidden rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-md sm:p-5 max-sm:rounded-xl max-sm:p-3">

                        <div class="flex min-w-0 flex-col gap-3 sm:flex-row sm:items-center sm:justify-between max-sm:gap-2">
                            <div class="min-w-0 flex-1">
                                <p class="mb-1 text-xs font-semibold uppercase text-blue-600 max-sm:w-full max-sm:truncate max-sm:text-[8px]!">
                                    Check-In Now Open
                                </p>

                                <h3 class="m-0 min-w-0 text-base! font-bold leading-snug text-slate-900 sm:text-lg! max-sm:w-full max-sm:truncate max-sm:text-[12px]! max-sm:leading-4">
                                    Roundtable Panel: Funding & Collaborations at BRIN
                                </h3>

                                <div class="mt-2 flex min-w-0 flex-wrap gap-x-5 gap-y-1 text-xs text-slate-500 max-sm:mt-1.5 max-sm:flex-nowrap max-sm:gap-x-3 max-sm:text-[9px]!">
                                    <span class="shrink-0">14:45 - 15:45 WIB</span>
                                    <span class="min-w-0 truncate">BRIN Auditorium</span>
                                </div>
                            </div>

                            <span class="inline-flex w-fit shrink-0 items-center gap-2 rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-600 max-sm:max-w-full max-sm:gap-1.5 max-sm:px-2 max-sm:py-1 max-sm:text-[8px]!">
                                <span class="size-1.5 shrink-0 rounded-full bg-blue-500"></span>
                                <span class="max-sm:truncate">Waiting for Check-In</span>
                            </span>
                        </div>
                    </div>

                    {{-- Instructions --}}
                    <div class="min-w-0 overflow-hidden rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-md sm:p-5 max-sm:rounded-xl max-sm:p-3">

                        <div class="mb-4 min-w-0 max-sm:mb-3">
                            <h3 class="m-0 text-base! font-bold text-slate-900 sm:text-lg! max-sm:w-full max-sm:truncate max-sm:text-sm!">
                                Check-In Instructions
                            </h3>

                            <p class="mt-1 text-xs text-slate-500 max-sm:w-full max-sm:truncate max-sm:text-[9px]!">
                                Follow the steps below to complete your attendance.
                            </p>
                        </div>

                        <div class="space-y-3 max-sm:space-y-2">
                            <div class="space-y-2">

                                {{-- Step 1 --}}
                                <div class="flex min-w-0 items-start gap-3 overflow-hidden rounded-xl bg-slate-50 p-2.5 max-sm:gap-2 max-sm:rounded-lg max-sm:p-2">
                                    <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-xs font-bold text-blue-600 max-sm:size-7 max-sm:text-[9px]!">
                                        1
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <h4 class="m-0 text-sm! font-semibold text-slate-800 max-sm:w-full max-sm:truncate max-sm:text-[10px]!">
                                            Scan the QR Code
                                        </h4>

                                        <p class="mt-0.5 text-xs leading-relaxed text-slate-500 max-sm:w-full max-sm:truncate max-sm:text-[9px]! max-sm:leading-4">
                                            Scan the QR code provided at the event entrance using your registered account.
                                        </p>
                                    </div>
                                </div>

                                {{-- Step 2 --}}
                                <div class="flex min-w-0 items-start gap-3 overflow-hidden rounded-xl bg-slate-50 p-2.5 max-sm:gap-2 max-sm:rounded-lg max-sm:p-2">
                                    <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-xs font-bold text-blue-600 max-sm:size-7 max-sm:text-[9px]!">
                                        2
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <h4 class="m-0 text-sm! font-semibold text-slate-800 max-sm:w-full max-sm:truncate max-sm:text-[10px]!">
                                            Confirm Your Attendance
                                        </h4>

                                        <p class="mt-0.5 text-xs leading-relaxed text-slate-500 max-sm:w-full max-sm:truncate max-sm:text-[9px]! max-sm:leading-4">
                                            Make sure your attendance status changes to confirmed after the QR code is successfully scanned.
                                        </p>
                                    </div>
                                </div>

                                {{-- Step 3 --}}
                                <div class="flex min-w-0 items-start gap-3 overflow-hidden rounded-xl bg-slate-50 p-2.5 max-sm:gap-2 max-sm:rounded-lg max-sm:p-2">
                                    <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-xs font-bold text-blue-600 max-sm:size-7 max-sm:text-[9px]!">
                                        3
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <h4 class="m-0 text-sm! font-semibold text-slate-800 max-sm:w-full max-sm:truncate max-sm:text-[10px]!">
                                            Need Assistance?
                                        </h4>

                                        <p class="mt-0.5 text-xs leading-relaxed text-slate-500 max-sm:w-full max-sm:truncate max-sm:text-[9px]! max-sm:leading-4">
                                            If the QR code cannot be scanned, please contact the event committee at the registration desk.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Back --}}
                    <div class="flex justify-end">
                        <a href="{{ url('/my-event') }}" class="inline-flex h-9 w-full items-center justify-center rounded-xl bg-blue-600 px-5 text-xs font-semibold text-white! no-underline! shadow-sm transition hover:bg-blue-700! hover:shadow-md sm:w-auto max-sm:h-8 max-sm:rounded-lg max-sm:text-[9px]!">
                            Back
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
