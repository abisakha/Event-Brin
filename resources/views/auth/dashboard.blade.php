<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | BRIN Event Management</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100">

    <main class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-xl bg-white rounded-2xl shadow p-8">

            <h1 class="text-2xl font-bold text-slate-900 mb-2">
                Dashboard
            </h1>

            <p class="text-slate-600 mb-6">
                Login berhasil melalui BRIN SSO.
            </p>

            <div class="space-y-2 mb-8">
                <p>
                    <span class="font-semibold">ID:</span>
                    {{ $user->id }}
                </p>

                <p>
                    <span class="font-semibold">Nama:</span>
                    {{ $user->name }}
                </p>

                <p>
                    <span class="font-semibold">Email:</span>
                    {{ $user->email }}
                </p>

                <p>
                    <span class="font-semibold">Username Intra:</span>
                    {{ $user->username_intra ?? '-' }}
                </p>

                <p>
                    <span class="font-semibold">Satker:</span>
                    {{ $user->satker_name }}
                </p>

                <p>
                    <span class="font-semibold">Status:</span>
                    {{ $user->status ? 'Active' : 'Inactive' }}
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="w-full py-3 px-4 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition"
                >
                    Logout
                </button>
            </form>

        </div>

    </main>

</body>

</html>