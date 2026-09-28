<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tarif Parkir - KABASA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background:
                radial-gradient(circle at top left, rgba(239, 68, 68, 0.08), transparent 30%),
                #050505;
        }

        .btn-red {
            background: #ef4444;
            transition: .25s ease;
        }

        .btn-red:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(239, 68, 68, .20);
        }

        .btn-dark {
            background: #111111;
            border: 1px solid #292929;
            transition: .25s ease;
        }

        .btn-dark:hover {
            background: #1d1d1d;
            border-color: #3f3f3f;
        }
    </style>
</head>

<body class="min-h-screen text-white">

<div class="min-h-screen">

    {{-- HEADER --}}
    <header class="border-b border-white/10 bg-[#080808]">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-8 py-5">

            <div>

                <p class="text-xs font-bold uppercase tracking-[0.3em] text-red-500">
                    KABASA ADMIN
                </p>

                <h1 class="mt-1 text-2xl font-black text-white">
                    Tarif Parkir
                </h1>

            </div>


            <div class="flex items-center gap-4">

                <div class="text-right">

                    <p class="text-sm font-semibold text-white">
                        {{ auth()->user()->nama_lengkap }}
                    </p>

                    <p class="text-xs capitalize text-slate-500">
                        {{ auth()->user()->role }}
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-red-500 font-black text-white shadow-lg shadow-red-500/20">

                    {{ strtoupper(substr(auth()->user()->nama_lengkap, 0, 1)) }}

                </div>

            </div>

        </div>

    </header>


    {{-- CONTENT --}}
    <main class="mx-auto max-w-7xl px-8 py-8">


        {{-- BUTTON --}}
        <div class="mb-6 flex items-center justify-between">

            <a
                href="{{ route('admin.dashboard', ['menu' => 'tarif']) }}"
                class="btn-dark inline-flex items-center gap-2 rounded-xl px-4 py-3 text-sm font-semibold text-slate-300"
            >
                ← Kembali
            </a>


            <a
                href="{{ route('admin.tarif.create') }}"
                class="btn-red inline-flex items-center gap-2 rounded-xl px-5 py-3 text-sm font-bold text-white"
            >

                <span class="text-lg">
                    +
                </span>

                Tambah Tarif

            </a>

        </div>


        {{-- SUCCESS --}}
        @if(session('success'))

            <div class="mb-6 rounded-2xl border border-green-900/50 bg-green-950/30 px-5 py-4 text-sm font-medium text-green-400">

                ✓ {{ session('success') }}

            </div>

        @endif


        {{-- TABLE --}}
        <div class="overflow-hidden rounded-3xl border border-white/10 bg-[#0b0b0b] shadow-2xl">

            <div class="border-b border-white/10 px-6 py-5">

                <p class="text-xs font-bold uppercase tracking-[0.2em] text-red-500">
                    Data Parkir
                </p>

                <h2 class="mt-1 text-xl font-black text-white">
                    Daftar Tarif Parkir
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola tarif parkir berdasarkan jenis kendaraan.
                </p>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="bg-[#111111]">

                        <tr>

                            <th class="px-6 py-4 font-semibold text-slate-500">
                                No
                            </th>

                            <th class="px-6 py-4 font-semibold text-slate-500">
                                ID Tarif
                            </th>

                            <th class="px-6 py-4 font-semibold text-slate-500">
                                Jenis Kendaraan
                            </th>

                            <th class="px-6 py-4 font-semibold text-slate-500">
                                Tarif Per Jam
                            </th>

                            <th class="px-6 py-4 text-center font-semibold text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-white/5">

                        @forelse($tarifs as $tarif)

                            <tr class="transition hover:bg-white/[0.02]">

                                {{-- NO --}}
                                <td class="px-6 py-5 font-medium text-slate-600">
                                    {{ $loop->iteration }}
                                </td>


                                {{-- ID --}}
                                <td class="px-6 py-5">

                                    <span class="rounded-lg border border-red-900/40 bg-red-950/20 px-3 py-1 text-xs font-bold text-red-400">
                                        {{ $tarif->id_tarif }}
                                    </span>

                                </td>


                                {{-- JENIS --}}
                                <td class="px-6 py-5">

                                    <span class="font-semibold text-white">
                                        {{ $tarif->jenis_kendaraan }}
                                    </span>

                                </td>


                                {{-- TARIF --}}
                                <td class="px-6 py-5">

                                    <span class="font-bold text-white">
                                        Rp {{ number_format($tarif->tarif_per_jam, 0, ',', '.') }}
                                    </span>

                                    <span class="text-slate-600">
                                        / jam
                                    </span>

                                </td>


                                {{-- AKSI --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center justify-center gap-2">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.tarif.edit', $tarif->id_tarif) }}"
                                            class="rounded-lg border border-white/10 bg-[#171717] px-3 py-2 text-xs font-semibold text-slate-300 transition hover:border-red-500/40 hover:text-red-400"
                                        >
                                            Edit
                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('admin.tarif.destroy', $tarif->id_tarif) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus tarif ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg border border-red-900/30 bg-red-950/20 px-3 py-2 text-xs font-semibold text-red-400 transition hover:bg-red-950/40"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="px-6 py-14 text-center">

                                    <div class="text-4xl">
                                        🅿️
                                    </div>

                                    <p class="mt-3 font-semibold text-white">
                                        Belum ada data tarif
                                    </p>

                                    <p class="mt-1 text-sm text-slate-600">
                                        Silakan tambahkan tarif parkir baru.
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