@extends('admin.layouts.main')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-semibold mb-4 dark:text-white">Manajemen Role & Permission</h1>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 dark:border-slate-700">
                <thead>
                    <tr class="bg-gray-100 dark:bg-slate-800">
                        <th class="border border-gray-300 dark:border-slate-700 p-2 text-left">Nama User</th>
                        <th class="border border-gray-300 dark:border-slate-700 p-2 text-left">Email</th>
                        <th class="border border-gray-300 dark:border-slate-700 p-2 text-left">Role Saat Ini</th>
                        <th class="border border-gray-300 dark:border-slate-700 p-2 text-left">Assign Role Baru</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border border-gray-300 dark:border-slate-700 p-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 dark:border-slate-700 p-2">{{ $user->email }}</td>
                            <td class="border border-gray-300 dark:border-slate-700 p-2">
                                @forelse ($user->roles as $role)
                                    <span class="inline-flex items-center gap-1 bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm mr-1 mb-1">
                                        {{ $role->role_intra ?? $role->name }}
                                        <form action="{{ route('admin.roles.destroy') }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <input type="hidden" name="role_name" value="{{ $role->name }}">
                                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Cabut role ini dari user?')">&times;</button>
                                        </form>
                                    </span>
                                @empty
                                    <span class="text-gray-400 text-sm">Belum ada role</span>
                                @endforelse
                            </td>
                            <td class="border border-gray-300 dark:border-slate-700 p-2">
                                <form action="{{ route('admin.roles.store') }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <select name="role_name" class="border rounded px-2 py-1 text-sm" required>
                                        <option value="">Pilih role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->role_intra ?? $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                                        Assign
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection