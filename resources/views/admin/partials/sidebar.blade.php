@php
    $activeEvent=session('active_event_id');

    // Dummy sementara untuk tampilan
    $isPlatformAdministrator=true;

    /*
    BACKEND LATER:

    Contoh jika relasi user -> roles sudah tersedia:

    $isPlatformAdministrator=auth()->check()
        && auth()->user()->roles
            ->contains(function($role){
                return $role->name==='platform_administrator'
                    || $role->role_intra==='Platform Administrator';
            });

    Atau jika menggunakan Spatie Permission:

    $isPlatformAdministrator=auth()->user()
        ->hasRole('Platform Administrator');
    */
@endphp

<aside class="hidden w-64 shrink-0 border-r border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900 md:flex md:flex-col">
    <div class="flex items-center justify-start border-b border-slate-200 px-5 py-5 dark:border-slate-800">
        <a href="{{ url('/dashboard') }}" class="flex items-center">
            {{-- Light Mode --}}
            <img src="{{ asset('assets/images/logo.png') }}" alt="BRIN" class="h-12 w-auto object-contain dark:hidden">

            {{-- Dark Mode --}}
            <img src="{{ asset('assets/images/logo-white.png') }}" alt="BRIN" class="hidden h-12 w-auto object-contain dark:block">
        </a>
    </div>

    <nav class="flex-1 space-y-1 p-4 text-sm">
        <a href="{{ url('/dashboard') }}" @class([
            'flex items-center gap-3 rounded-lg px-4 py-3 font-medium transition',
            'bg-blue-100 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400'=>request()->is('dashboard'),
            'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white'=>!request()->is('admin/dashboard')
        ])>
            <i data-lucide="layout-dashboard" class="h-5 w-5"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('/admin/events') }}" @class([
            'flex items-center gap-3 rounded-lg px-4 py-3 font-medium transition',
            'bg-blue-100 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400'=>request()->is('admin/events'),
            'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white'=>!request()->is('admin/events')
        ])>
            <i data-lucide="calendar-days" class="h-5 w-5"></i>
            <span>My Events</span>
        </a>

        <a href="{{ url('/admin/events/create-event') }}" @class([
            'flex items-center gap-3 rounded-lg px-4 py-3 font-medium transition',
            'bg-blue-100 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400'=>request()->is('admin/events/create-event'),
            'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white'=>!request()->is('admin/events/create-event')
        ])>
            <i data-lucide="circle-plus" class="h-5 w-5"></i>
            <span>Create Event</span>
        </a>

        <div class="my-3 border-t border-slate-200 dark:border-slate-800"></div>

        <a href="/admin/registration" @class([
            'flex items-center gap-3 rounded-lg px-4 py-3 font-medium transition',
            'bg-blue-100 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400'=>request()->is('admin/registration'),
            'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white'=>!request()->is('admin/registration')
        ])>
            <i data-lucide="users" class="h-5 w-5"></i>
            <span>Registrations</span>
        </a>

        <a href="/admin/attendance" @class([
            'flex items-center gap-3 rounded-lg px-4 py-3 font-medium transition',
            'bg-blue-100 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400'=>request()->is('admin/attendance'),
            'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white'=>!request()->is('admin/attendance')
        ])>
            <i data-lucide="user-check" class="h-5 w-5"></i>
            <span>Attendance</span>
        </a>

        <a href="/admin/survey" @class([
            'flex items-center gap-3 rounded-lg px-4 py-3 font-medium transition',
            'bg-blue-100 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400'=>request()->is('admin/survey'),
            'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white'=>!request()->is('admin/survey')
        ])>
            <i data-lucide="clipboard-list" class="h-5 w-5"></i>
            <span>Surveys</span>
        </a>

        @if($isPlatformAdministrator)
            <div class="my-3 border-t border-slate-200 dark:border-slate-800"></div>

            <a href="{{ url('/admin/roles') }}" @class([
                'flex items-center gap-3 rounded-lg px-4 py-3 font-medium transition',
                'bg-blue-100 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400'=>request()->is('admin/roles')||request()->is('admin/roles/*'),
                'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white'=>!request()->is('admin/roles')&&!request()->is('admin/roles/*')
            ])>
                <i data-lucide="shield-check" class="h-5 w-5"></i>
                <span>Manajemen Role</span>
            </a>

            {{--
            BACKEND LATER:
            Menu ini hanya boleh tampil jika user mempunyai role:
            Platform Administrator
            @if(auth()->user()->hasRole('Platform Administrator'))
                <a href="{{ url('/admin/roles') }}">
                    Manajemen Role
                </a>
            @endif
            --}}
        @endif
    </nav>

    <div class="border-t border-slate-200 p-4 dark:border-slate-800">
        <a href="{{ url('/admin/profile') }}" @class([
            'flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition',
            'bg-blue-100 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400'=>request()->is('admin/profile'),
            'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white'=>!request()->is('admin/profile')
        ])>
            <i data-lucide="user" class="h-5 w-5"></i>
            <span>Profile</span>
        </a>

        <a href="{{ url('/admin/help') }}" @class([
            'flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition',
            'bg-blue-100 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400'=>request()->is('admin/help'),
            'text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white'=>!request()->is('admin/help')
        ])>
            <i data-lucide="circle-help" class="h-5 w-5"></i>
            <span>Help</span>
        </a>

        <form method="POST" action="{{ url('/logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-red-50 hover:text-red-600 dark:text-slate-300 dark:hover:bg-red-950/40 dark:hover:text-red-400">
                <i data-lucide="log-out" class="h-5 w-5"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
