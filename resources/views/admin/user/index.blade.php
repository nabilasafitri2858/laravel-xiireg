<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data User - KABASA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <div class="min-h-screen">

        {{-- =========================
             HEADER
        ========================== --}}
        <header class="border-b border-slate-200 bg-white">

            <div class="mx-auto flex max-w-7xl items-center justify-between px-8 py-5">

                <div>
                    <p class="text-xs font-medium uppercase tracking-widest text-slate-400">
                        KABASA Parking System
                    </p>

                    <h1 class="mt-1 text-2xl font-bold text-slate-950">
                        Data User
                    </h1>
                </div>

                <div class="flex items-center gap-4">

                    {{-- Nama user yang sedang login --}}
                    <div class="text-right">

                        <p class="text-sm font-semibold text-slate-800">
                            {{ auth()->user()->nama_lengkap }}
                        </p>

                        <p class="text-xs capitalize text-slate-400">
                            {{ auth()->user()->role }}
                        </p>

                    </div>

                    {{-- Avatar --}}
                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-950 font-bold text-white">

                        {{ strtoupper(substr(auth()->user()->nama_lengkap, 0, 1)) }}

                    </div>

                </div>

            </div>

        </header>


        {{-- =========================
             CONTENT
        ========================== --}}
        <main class="mx-auto max-w-7xl px-8 py-8">


            {{-- Tombol kembali + tambah --}}

            <div class="mb-6 flex items-center justify-between">

                <a href="/admin/dashboard"
                    class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">

                    ← Kembali

                </a>


                <a href="{{ route('admin.user.create') }}"
                    class="inline-flex items-center gap-2 rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-slate-800">

                    <span class="text-lg">+</span>

                    Tambah User

                </a>

            </div>


            {{-- =========================
                 PESAN BERHASIL
            ========================== --}}

            @if(session('success'))

                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">

                    ✓ {{ session('success') }}

                </div>

            @endif


            {{-- =========================
                 TABEL USER
            ========================== --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


                {{-- Judul tabel --}}

                <div class="border-b border-slate-200 px-6 py-5">

                    <h2 class="text-lg font-bold text-slate-950">
                        Daftar Pengguna
                    </h2>

                    <p class="mt-1 text-sm text-slate-400">
                        Kelola akun admin, petugas, dan owner.
                    </p>

                </div>


                {{-- Tabel --}}

                <div class="overflow-x-auto">

                    <table class="w-full text-left text-sm">


                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-4 font-semibold text-slate-500">
                                    No
                                </th>

                                <th class="px-6 py-4 font-semibold text-slate-500">
                                    ID User
                                </th>

                                <th class="px-6 py-4 font-semibold text-slate-500">
                                    Nama Lengkap
                                </th>

                                <th class="px-6 py-4 font-semibold text-slate-500">
                                    Username
                                </th>

                                <th class="px-6 py-4 font-semibold text-slate-500">
                                    Role
                                </th>

                                <th class="px-6 py-4 font-semibold text-slate-500">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-center font-semibold text-slate-500">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">


                            @forelse($users as $user)

                                <tr class="transition hover:bg-slate-50">


                                    {{-- No --}}

                                    <td class="px-6 py-4 font-medium text-slate-400">

                                        {{ $loop->iteration }}

                                    </td>


                                    {{-- ID USER --}}

                                    <td class="px-6 py-4">

                                        <span class="rounded-lg bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">

                                            {{ $user->id_user }}

                                        </span>

                                    </td>


                                    {{-- NAMA --}}

                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">


                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-900 text-xs font-bold text-white">

                                                {{ strtoupper(substr($user->nama_lengkap, 0, 1)) }}

                                            </div>


                                            <div>

                                                <p class="font-semibold text-slate-800">

                                                    {{ $user->nama_lengkap }}

                                                </p>

                                            </div>


                                        </div>

                                    </td>


                                    {{-- USERNAME --}}

                                    <td class="px-6 py-4 text-slate-600">

                                        {{ $user->username }}

                                    </td>


                                    {{-- ROLE --}}

                                    <td class="px-6 py-4">

                                        @if($user->role === 'admin')

                                            <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700">
                                                Admin
                                            </span>

                                        @elseif($user->role === 'petugas')

                                            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                                Petugas
                                            </span>

                                        @else

                                            <span class="rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">
                                                Owner
                                            </span>

                                        @endif

                                    </td>


                                    {{-- STATUS --}}

                                    <td class="px-6 py-4">

                                        @if($user->status_aktif == 1)

                                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                                Aktif
                                            </span>

                                        @else

                                            <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                                Tidak Aktif
                                            </span>

                                        @endif

                                    </td>


                                    {{-- AKSI --}}

                                    <td class="px-6 py-4">

                                        <div class="flex items-center justify-center gap-2">


                                            {{-- EDIT --}}

                                            <a href="{{ route('admin.user.edit', $user->id_user) }}"
                                                class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-200">

                                                Edit

                                            </a>


                                            {{-- HAPUS --}}

                                            <form action="{{ route('admin.user.destroy', $user->id_user) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">

                                                    Hapus

                                                </button>

                                            </form>


                                        </div>

                                    </td>


                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7" class="px-6 py-12 text-center">

                                        <div class="text-4xl">
                                            👤
                                        </div>

                                        <p class="mt-3 font-semibold text-slate-700">
                                            Belum ada data user
                                        </p>

                                        <p class="mt-1 text-sm text-slate-400">
                                            Silakan tambahkan user baru.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse


                        </tbody>

                    </table>

                </div>


            </div>


        </main>

    </div>

</body>

</html>