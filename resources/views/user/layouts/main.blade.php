<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
       {{ $title }} | BRIN Event Management
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/brin.css')}}" rel="stylesheet">
 @vite(['resources/css/app.css','resources/js/app.js'])
 @livewireStyles

</head>
<body>
    @include('user.partials.navbar')

    @yield('content')

    @include('user.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireScripts
</body>

</html>
