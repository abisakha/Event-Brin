<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>       {{ $title }} | Admin Event Management </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    @vite(['resources/css/app.css','resources/js/admin/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 transition duration-300 dark:bg-slate-950 dark:text-white">
    <div class="flex min-h-screen">
        @include('admin.partials.sidebar')
        <div class="flex min-w-0 flex-1 flex-col">
            @include('admin.partials.navbar')
            <main class="flex-1">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
