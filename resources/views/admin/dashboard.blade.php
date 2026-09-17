@extends('admin.layouts.main')

@section('content')
<section class="p-8">
    <div class="mb-10">
        <h1 class="text-4xl text-shadow font-bold text-slate-900 dark:text-white">Dashboard</h1>
        <p class="mt-2 text-sm text-slate-500">System overview and analytics for your active research summits.</p>
    </div>
    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-xl border border-slate-200 bg-white p-6 transition hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-slate-500">Total Events</p>
                    <h2 class="mt-4 text-3xl font-bold">12</h2>
                    <p class="mt-2 text-xs text-green-500">+8% vs last month</p>
                </div>
                <div class="rounded-lg bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/40">
                    <i data-lucide="calendar-days" class="h-5 w-5"></i>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-6 transition hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-slate-500">Upcoming</p>
                    <h2 class="mt-4 text-3xl font-bold">5</h2>
                    <p class="mt-2 text-xs text-green-500">Steady vs last month</p>
                </div>
                <div class="rounded-lg bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/40">
                    <i data-lucide="clock" class="h-5 w-5"></i>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-6 transition hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-slate-500">Total Registrations</p>
                    <h2 class="mt-4 text-3xl font-bold">428</h2>
                    <p class="mt-2 text-xs text-green-500">+24% vs last month</p>
                </div>
                <div class="rounded-lg bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/40">
                    <i data-lucide="users" class="h-5 w-5"></i>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-6 transition hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-slate-500">Attendance Rate</p>
                    <h2 class="mt-4 text-3xl font-bold">315</h2>
                    <p class="mt-2 text-xs text-green-500">73.6% average</p>
                </div>
                <div class="rounded-lg bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/40">
                    <i data-lucide="badge-check" class="h-5 w-5"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-6 lg:col-span-2 dark:border-slate-800 dark:bg-slate-900">
            <div class="mb-5 flex items-center justify-between">
                <h2 class="font-semibold">Upcoming Events</h2>
                <a href="{{ url('/admin/events') }}" class="text-sm font-medium text-blue-600 no-underline hover:underline">View All</a>
            </div>
            <div class="space-y-3">
                <div class="min-w-0 flex-1 items-center justify-between rounded-lg border border-slate-200 p-4 transition hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">
                    <div>
                        <h3 class="font-semibold truncate">National Research Innovation Summit 2026 National Research Innovation Summit 2026</h3>
                        <p class="mt-1 text-xs text-slate-500">Oct 12, 2026 • Gedung BJ Habibie, Jakarta</p>
                    </div>
                    <span class="shrink-0 rounded-full bg-blue-100 py-1 ps-3 pe-3 text-xs text-blue-600">Published</span>
                </div>
                <div class="flex items-center justify-between rounded-lg border border-slate-200 p-4 transition hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">
                    <div>
                        <h3 class="font-semibold">Artificial Intelligence in Public Policy</h3>
                        <p class="mt-1 text-xs text-slate-500">Nov 05, 2026 • Online Zoom Meeting</p>
                    </div>
                    <span class="rounded-full bg-blue-100 py-1 ps-3 pe-3 text-xs text-blue-600">Published</span>
                </div>
                <div class="grid grid-cols-4 items-center gap-4 rounded-lg border border-slate-200 p-4 transition hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">
                <div class="col-span-3 min-w-0">
                    <h3 class="truncate font-semibold">Maritime Tech Expo & Maritime Forum Maritime Tech Expo & Maritime Forum</h3>
                    <p class="mt-1 truncate text-xs text-slate-500">Dec 10, 2026 • BRIN Office</p>
                </div>
                <span class="justify-self-end whitespace-nowrap rounded-full bg-blue-100 py-1 ps-3 pe-3 text-xs font-medium text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">Published</span>
            </div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
            <h2 class="mb-5 font-semibold">Recent Activity Feed</h2>
            <div class="space-y-5 text-sm">
                <div>
                    <p><span class="text-blue-500">●</span> Dr. Maya registered for AI Forum</p>
                    <p class="mt-1 ps-4 text-xs text-slate-500">2 mins ago</p>
                </div>
                <div>
                    <p><span class="text-blue-500">●</span> Oceanography Meetup updated</p>
                    <p class="mt-1 ps-4 text-xs text-slate-500">1 hour ago</p>
                </div>
                <div>
                    <p><span class="text-blue-500">●</span> Draft saved for Renewable Energy Expo</p>
                    <p class="mt-1 ps-4 text-xs text-slate-500">4 hours ago</p>
                </div>
                <div>
                    <p><span class="text-blue-500">●</span> Attendance report generated</p>
                    <p class="mt-1 ps-4 text-xs text-slate-500">Yesterday</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
