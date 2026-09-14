<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>BRIN Event Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
</head>
<body class="bg-slate-100 text-slate-800 transition duration-300 dark:bg-slate-950 dark:text-white">

<div class="flex min-h-screen">

    <!-- Sidebar -->
   @php
    $activeEvent = session('active_event_id');
@endphp

<aside class="hidden w-64 border-r bg-white dark:border-slate-800 dark:bg-slate-900 md:flex md:flex-col">

    <div class="flex items-center gap-3 border-b p-5 dark:border-slate-800">
        <div class="rounded-lg bg-blue-600 px-3 py-2 text-sm font-bold text-white">
            BRIN
        </div>
        <div>
            <p class="text-sm font-bold">EVENT MANAGEMENT</p>
            <p class="text-xs text-slate-400">Admin Panel</p>
        </div>
    </div>

    <nav class="flex-1 space-y-1 p-4 text-sm">

        <a href=""
           class="flex items-center gap-3 rounded-lg bg-blue-100 px-4 py-3 text-blue-600 transition hover:bg-blue-200">
            <i data-lucide="layout-dashboard" class="h-5 w-5"></i>
            Dashboard
        </a>

        <a href=""
           class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
            <i data-lucide="calendar-days" class="h-5 w-5"></i>
            My Events
        </a>

        <a href=""
           class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
            <i data-lucide="circle-plus" class="h-5 w-5"></i>
            Create Event
        </a>


        @if($activeEvent)

            <div class="my-3 border-t dark:border-slate-800"></div>

            <p class="px-4 text-xs text-slate-400">
                EVENT MENU
            </p>

            <a href=""
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
                <i data-lucide="users" class="h-5 w-5"></i>
                Registrations
            </a>

            <a href=""
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
                <i data-lucide="user-check" class="h-5 w-5"></i>
                Attendance
            </a>

            <a href=""
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
                <i data-lucide="clipboard-list" class="h-5 w-5"></i>
                Surveys
            </a>

            <a href=""
               class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
                <i data-lucide="bell" class="h-5 w-5"></i>
                Notifications
            </a>

        @endif

    </nav>


    <div class="border-t p-4 dark:border-slate-800">

        <a href=""
           class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
            <i data-lucide="user" class="h-5 w-5"></i>
            Profile
        </a>

        <a href="#"
           class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
            <i data-lucide="circle-help" class="h-5 w-5"></i>
            Help
        </a>

        <form method="POST" action="">
            @csrf
            <button class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800">
                <i data-lucide="log-out" class="h-5 w-5"></i>
                Logout
            </button>
        </form>

    </div>

</aside>


    <!-- Main Content -->
    <main class="flex-1">


        <!-- Navbar -->
        <header class="flex flex-wrap items-center justify-between gap-4 border-b bg-white px-5 py-4 dark:border-slate-800 dark:bg-slate-900">

            <div class="flex items-center rounded-lg bg-slate-100 px-3 py-2 dark:bg-slate-800">

                <i data-lucide="search" class="mr-2 h-4 w-4 text-slate-400"></i>

                <input type="text" placeholder="Search events, users..." class="w-64 bg-transparent text-sm outline-none">

            </div>


            <div class="flex items-center gap-4">

                <button id="themeBtn" class="rounded-full border p-2 transition duration-500 hover:rotate-180 dark:border-slate-700">

                    <i id="themeIcon" data-lucide="moon" class="h-5 w-5"></i>

                </button>


                <div class="flex items-center gap-3">

                    <img src="https://i.pravatar.cc/40" class="h-10 w-10 rounded-full">

                    <div class="hidden md:block">
                        <p class="text-sm font-semibold">Dr. Handoko</p>
                        <p class="text-xs text-slate-500">Event Coordinator</p>
                    </div>

                </div>

            </div>

        </header>
                <section class="p-5">

            <div class="mb-5">
                <h1 class="text-2xl font-bold">Dashboard</h1>
                <p class="text-sm text-slate-500">System overview and analytics for your active research summits.</p>
            </div>


            <!-- Statistic Cards -->
            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

                <div class="rounded-xl border bg-white p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-sm text-slate-500">Total Events</p>
                            <h2 class="mt-3 text-3xl font-bold">12</h2>
                            <p class="mt-2 text-xs text-green-500">+8% vs last month</p>
                        </div>

                        <div class="rounded-lg bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/40">
                            <i data-lucide="calendar-days" class="h-5 w-5"></i>
                        </div>

                    </div>

                </div>


                <div class="rounded-xl border bg-white p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-sm text-slate-500">Upcoming</p>
                            <h2 class="mt-3 text-3xl font-bold">5</h2>
                            <p class="mt-2 text-xs text-green-500">Steady vs last month</p>
                        </div>

                        <div class="rounded-lg bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/40">
                            <i data-lucide="clock" class="h-5 w-5"></i>
                        </div>

                    </div>

                </div>


                <div class="rounded-xl border bg-white p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-sm text-slate-500">Total Registrations</p>
                            <h2 class="mt-3 text-3xl font-bold">428</h2>
                            <p class="mt-2 text-xs text-green-500">+24% vs last month</p>
                        </div>

                        <div class="rounded-lg bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/40">
                            <i data-lucide="users" class="h-5 w-5"></i>
                        </div>

                    </div>

                </div>


                <div class="rounded-xl border bg-white p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-sm text-slate-500">Attendance Rate</p>
                            <h2 class="mt-3 text-3xl font-bold">315</h2>
                            <p class="mt-2 text-xs text-green-500">73.6% average</p>
                        </div>

                        <div class="rounded-lg bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/40">
                            <i data-lucide="badge-check" class="h-5 w-5"></i>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Content Section -->
            <div class="mt-5 grid gap-5 lg:grid-cols-3">


                <!-- Upcoming Event -->
                <div class="rounded-xl border bg-white p-5 lg:col-span-2 dark:border-slate-800 dark:bg-slate-900">

                    <div class="mb-4 flex items-center justify-between">
                        <h2 class="font-semibold">Upcoming Events</h2>
                        <a href="#" class="text-sm text-blue-600 hover:underline">View All</a>
                    </div>


                    <div class="space-y-3">

                        <div class="flex items-center justify-between rounded-lg border p-4 transition hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">

                            <div>
                                <h3 class="font-semibold">National Research Innovation Summit 2026</h3>
                                <p class="text-xs text-slate-500">Oct 12, 2026 • Gedung BJ Habibie, Jakarta</p>
                            </div>

                            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs text-blue-600">
                                Published
                            </span>

                        </div>


                        <div class="flex items-center justify-between rounded-lg border p-4 transition hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">

                            <div>
                                <h3 class="font-semibold">Artificial Intelligence in Public Policy</h3>
                                <p class="text-xs text-slate-500">Nov 05, 2026 • Online Zoom Meeting</p>
                            </div>

                            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs text-blue-600">
                                Published
                            </span>

                        </div>


                        <div class="flex items-center justify-between rounded-lg border p-4 transition hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800">

                            <div>
                                <h3 class="font-semibold">Maritime Tech Expo & Maritime Forum</h3>
                                <p class="text-xs text-slate-500">Dec 10, 2026 • BRIN Office</p>
                            </div>

                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs text-slate-600 dark:bg-slate-800">
                                Draft
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Activity -->
                <div class="rounded-xl border bg-white p-5 dark:border-slate-800 dark:bg-slate-900">

                    <h2 class="mb-4 font-semibold">Recent Activity Feed</h2>

                    <div class="space-y-4 text-sm">

                        <div>
                            <p>
                                <span class="text-blue-500">●</span>
                                Dr. Maya registered for AI Forum
                            </p>
                            <span class="ml-4 text-xs text-slate-500">2 mins ago</span>
                        </div>

                        <div>
                            <p>
                                <span class="text-blue-500">●</span>
                                Oceanography Meetup updated
                            </p>
                            <span class="ml-4 text-xs text-slate-500">1 hour ago</span>
                        </div>

                        <div>
                            <p>
                                <span class="text-blue-500">●</span>
                                Draft saved for Renewable Energy Expo
                            </p>
                            <span class="ml-4 text-xs text-slate-500">4 hours ago</span>
                        </div>

                        <div>
                            <p>
                                <span class="text-blue-500">●</span>
                                Attendance report generated
                            </p>
                            <span class="ml-4 text-xs text-slate-500">Yesterday</span>
                        </div>

                    </div>

                </div>

            </div>

        </section>

            </main>

</div>

<script>
    lucide.createIcons();

    const themeBtn=document.getElementById('themeBtn');
    const themeIcon=document.getElementById('themeIcon');

    if(localStorage.theme==='dark'){
        document.documentElement.classList.add('dark');
        themeIcon.setAttribute('data-lucide','sun');
        lucide.createIcons();
    }

    themeBtn.addEventListener('click',()=>{

        document.documentElement.classList.toggle('dark');

        if(document.documentElement.classList.contains('dark')){
            localStorage.theme='dark';
            themeIcon.setAttribute('data-lucide','sun');
        }else{
            localStorage.theme='light';
            themeIcon.setAttribute('data-lucide','moon');
        }

        themeIcon.classList.add('rotate-180');

        setTimeout(()=>{
            themeIcon.classList.remove('rotate-180');
        },300);

        lucide.createIcons();

    });
</script>

</body>
</html>
