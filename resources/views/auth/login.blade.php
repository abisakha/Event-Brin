<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | BRIN Event Management</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen">

    <main class="min-h-screen flex items-center justify-center bg-slate-50 px-4 py-2">

        <div
            class="w-full max-w-[420px] flex flex-col items-center gap-4 p-12 md:p-12
                   bg-white rounded-2xl border border-slate-200
                   shadow-[0_4px_12px_rgba(15,23,42,0.05)]">

            {{-- BRIN Logo --}}
            <div class="w-full max-w-[250px] h-[100px]">
                <img
                    src="{{ asset('assets/images/logo_brin.png') }}"
                    alt="BRIN"
                    class="w-full h-full object-contain">
            </div>


            {{-- Title --}}
            <div class="w-full flex flex-col items-center gap-2 text-center">
                <h1
                    class="font-bold text-2xl text-slate-900">
                    BRIN Event Management
                </h1>
                <p
                    class="text-sm text-slate-600">
                    Sign in to manage your events
                </p>
            </div>


            {{-- Login Button --}}
            <a
                href="{{ route('sso.redirect') }}"
                class="w-full flex items-center justify-center gap-2
                       py-3.5 px-4
                       bg-sky-600 hover:bg-sky-700
                       rounded-lg no-underline
                       transition-colors duration-200">

                <div class="w-5 h-5 shrink-0">
                    <img
                        src="{{ asset('assets/images/key-round.png') }}"
                        alt=""
                        class="w-full h-full object-contain">
                </div>

                <span
                    class="font-semibold text-base text-white whitespace-nowrap">
                    Continue with BRIN SSO
                </span>

            </a>


            {{-- Information --}}
            <div class="flex items-center gap-2">
                <div class="w-3.5 h-3.5 shrink-0">
                    <img
                        src="{{ asset('assets/images/Vector.png') }}"
                        alt=""
                        class="w-full h-full object-contain">
                </div>

                <p
                    class="text-xs text-slate-400 text-center">
                    Authorized access only for BRIN Personnel
                </p>
            </div>
        </div>
    </main>
</body>
</html>