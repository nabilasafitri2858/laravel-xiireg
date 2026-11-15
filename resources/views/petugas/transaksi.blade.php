<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transaksi Parkir - KABASA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background:
                radial-gradient(circle at top right, rgba(127, 29, 29, 0.20), transparent 30%),
                radial-gradient(circle at bottom left, rgba(153, 27, 27, 0.15), transparent 30%),
                #090909;
        }

        .red-glow {
            box-shadow: 0 0 30px rgba(239, 68, 68, 0.08);
        }

        .card-hover {
            transition: all 0.25s ease;
        }

        .card-hover:hover {
            transform: translateY(-3px);
            border-color: rgba(239, 68, 68, 0.55);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #090909;
        }

        ::-webkit-scrollbar-thumb {
            background: #991b1b;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ef4444;
        }
    </style>
</head>

<body class="text-white">

<div class="min-h-screen flex">

    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside class="fixed left-0 top-0 z-40 flex h-screen w-72 flex-col
                   border-r border-red-950/50 bg-black text-white">

        {{-- LOGO --}}
        <div class="flex h-24 items-center border-b border-red-950/60 px-7">

            <div class="flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl
                            bg-gradient-to-br from-red-500 to-red-900
                            text-xl font-black text-white shadow-lg shadow-red-900/30">
                    K
                </div>

                <div>
                    <h1 class="text-xl font-bold tracking-wide">
                        KABASA
                    </h1>

                    <p class="text-xs text-red-400">
                        Parking System
                    </p>
                </div>

            </div>

        </div>


        {{-- MENU --}}
        <nav class="flex-1 px-4 py-6">

            <p class="mb-3 px-3 text-[11px] font-bold uppercase
                      tracking-[0.15em] text-red-500">
                Menu Petugas
            </p>


            {{-- DASHBOARD --}}
            <a href="{{ route('petugas.dashboard') }}"
               class="mb-2 flex items-center gap-3 rounded-xl
                      px-4 py-3 text-sm text-slate-300
                      transition hover:bg-red-950/60 hover:text-white">

                <span class="flex h-8 w-8 items-center justify-center
                             rounded-lg bg-red-950/70">
                    🏠
                </span>

                Dashboard

            </a>


            {{-- TRANSAKSI --}}
            <a href="{{ route('petugas.transaksi') }}"
               class="mb-2 flex items-center gap-3 rounded-xl
                      bg-gradient-to-r from-red-500 to-red-800
                      px-4 py-3.5 text-sm font-semibold text-white
                      shadow-lg shadow-red-950/30">

                <span class="flex h-8 w-8 items-center justify-center
                             rounded-lg bg-white/10">
                    🎫
                </span>

                Transaksi

            </a>


            {{-- CETAK STRUK --}}
            <a href="#"
               class="group flex items-center gap-3 rounded-xl
                      px-4 py-3 text-sm text-slate-300
                      transition hover:bg-red-950/60 hover:text-white">

                <span class="flex h-8 w-8 items-center justify-center
                             rounded-lg bg-red-950/70
                             group-hover:bg-red-800">
                    🧾
                </span>

                Cetak Struk Parkir

            </a>

        </nav>


        {{-- USER + LOGOUT --}}
        <div class="border-t border-red-950/60 p-4">

            <div class="mb-3 flex items-center gap-3 rounded-xl
                        border border-red-950/50 bg-red-950/20 p-3">

                <div class="flex h-10 w-10 items-center justify-center
                            rounded-full bg-gradient-to-br from-red-500 to-red-900
                            font-bold text-white">

                    {{
                        collect(explode(' ', trim(auth()->user()->nama_lengkap ?? auth()->user()->nama)))
                            ->filter()
                            ->take(2)
                            ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                            ->implode('')
                    }}

                </div>

                <div class="min-w-0">

                    <p class="truncate text-sm font-semibold text-white">
                        {{ auth()->user()->nama_lengkap ?? auth()->user()->nama }}
                    </p>

                    <p class="text-xs capitalize text-red-400">
                        {{ auth()->user()->role }}
                    </p>

                </div>

            </div>


            {{-- LOGOUT --}}
            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3 rounded-xl
                           px-4 py-3 text-sm text-slate-400
                           transition hover:bg-red-950/60 hover:text-red-400">

                    <span>↪</span>

                    Logout

                </button>

            </form>

        </div>

    </aside>


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main class="ml-72 min-h-screen flex-1">


        {{-- TOPBAR --}}
        <header class="sticky top-0 z-30 flex h-24 items-center
                       justify-between border-b border-red-950/50
                       bg-black/90 px-8 backdrop-blur">

            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-red-500">
                    KABASA Parking System
                </p>

                <h2 class="mt-1 text-xl font-bold text-white">
                    Transaksi Parkir
                </h2>

            </div>


            {{-- USER --}}
            <div class="flex items-center gap-4">

                <div class="text-right">

                    <p class="text-sm font-semibold text-white">
                        {{ auth()->user()->nama_lengkap ?? auth()->user()->nama }}
                    </p>

                    <p class="text-xs capitalize text-red-400">
                        {{ auth()->user()->role }}
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center
                            rounded-full bg-gradient-to-br from-red-500 to-red-900
                            text-sm font-bold text-white shadow-lg">

                    {{
                        collect(explode(' ', trim(auth()->user()->nama_lengkap ?? auth()->user()->nama)))
                            ->filter()
                            ->take(2)
                            ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                            ->implode('')
                    }}

                </div>

            </div>

        </header>


        {{-- CONTENT --}}
        <div class="p-8">


            {{-- NOTIFICATION --}}
            @if(session('success'))

                <div class="mb-6 rounded-xl border border-green-900/50
                            bg-green-950/30 px-5 py-4 text-sm text-green-400">

                    ✓ {{ session('success') }}

                </div>

            @endif


            @if(session('error'))

                <div class="mb-6 rounded-xl border border-red-900/60
                            bg-red-950/40 px-5 py-4 text-sm text-red-400">

                    ⚠ {{ session('error') }}

                </div>

            @endif


            {{-- VALIDATION ERROR --}}
            @if($errors->any())

                <div class="mb-6 rounded-xl border border-red-900/60
                            bg-red-950/40 px-5 py-4">

                    <p class="mb-2 text-sm font-bold text-red-400">
                        Terjadi kesalahan:
                    </p>

                    <ul class="list-inside list-disc text-sm text-red-300">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- HEADER --}}
            <div class="mb-8">

                <h1 class="text-3xl font-bold text-white">
                    Transaksi Parkir
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Catat kendaraan masuk dan proses kendaraan keluar.
                </p>

            </div>


            {{-- =====================================================
                 FORM KENDARAAN MASUK
            ====================================================== --}}

            <div class="mb-8 rounded-2xl border border-red-950/60
                        bg-black p-7 shadow-lg red-glow">

                <div class="mb-6">

                    <h3 class="text-lg font-bold text-white">
                        🚗 Kendaraan Masuk
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Isi data kendaraan yang akan masuk area parkir.
                    </p>

                </div>


                <form action="{{ route('petugas.transaksi.store') }}"
                      method="POST">

                    @csrf

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-3">


                        {{-- KENDARAAN --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-slate-300">
                                Kendaraan
                            </label>

                            <select
                                name="id_kendaraan"
                                required
                                class="w-full rounded-xl border border-red-950/60
                                       bg-zinc-950 px-4 py-3 text-sm text-white
                                       outline-none transition
                                       focus:border-red-500 focus:ring-1
                                       focus:ring-red-500">

                                <option value="" class="bg-zinc-950">
                                    -- Pilih Kendaraan --
                                </option>

                                @foreach($kendaraan as $item)

                                    <option
                                        value="{{ $item->id_kendaraan }}"
                                        class="bg-zinc-950">

                                        {{ $item->id_kendaraan }}
                                        -
                                        {{ $item->jenis_kendaraan }}
                                        -
                                        {{ $item->warna }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- TARIF --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-slate-300">
                                Tarif Parkir
                            </label>

                            <select
                                name="id_tarif"
                                required
                                class="w-full rounded-xl border border-red-950/60
                                       bg-zinc-950 px-4 py-3 text-sm text-white
                                       outline-none transition
                                       focus:border-red-500 focus:ring-1
                                       focus:ring-red-500">

                                <option value="" class="bg-zinc-950">
                                    -- Pilih Tarif --
                                </option>

                                @foreach($tarif as $item)

                                    <option
                                        value="{{ $item->id_tarif }}"
                                        class="bg-zinc-950">

                                        {{ $item->jenis_kendaraan }}
                                        -
                                        Rp {{ number_format($item->tarif_per_jam, 0, ',', '.') }}/jam

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- AREA --}}
                        <div>

                            <label class="mb-2 block text-sm font-medium text-slate-300">
                                Area Parkir
                            </label>

                            <select
                                name="id_area"
                                required
                                class="w-full rounded-xl border border-red-950/60
                                       bg-zinc-950 px-4 py-3 text-sm text-white
                                       outline-none transition
                                       focus:border-red-500 focus:ring-1
                                       focus:ring-red-500">

                                <option value="" class="bg-zinc-950">
                                    -- Pilih Area --
                                </option>

                                @foreach($area as $item)

                                    <option
                                        value="{{ $item->id_area }}"
                                        class="bg-zinc-950">

                                        {{ $item->nama_area }}
                                        -
                                        Terisi {{ $item->terisi }}/{{ $item->kapasitas }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>


                    {{-- BUTTON --}}
                    <div class="mt-6 flex justify-end">

                        <button
                            type="submit"
                            class="rounded-xl bg-gradient-to-r
                                   from-red-500 to-red-800
                                   px-6 py-3 text-sm font-bold text-white
                                   shadow-lg shadow-red-950/30
                                   transition hover:from-red-400
                                   hover:to-red-700">

                            + Simpan Kendaraan Masuk

                        </button>

                    </div>

                </form>

            </div>


            {{-- =====================================================
                 TABEL TRANSAKSI
            ====================================================== --}}

            <div class="rounded-2xl border border-red-950/60
                        bg-black shadow-lg red-glow">

                <div class="border-b border-red-950/50 p-7">

                    <h3 class="text-lg font-bold text-white">
                        Data Transaksi
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Daftar seluruh transaksi parkir.
                    </p>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead class="border-b border-red-950/60 bg-red-950/20">

                            <tr>

                                <th class="px-6 py-4 text-xs font-bold uppercase
                                           tracking-wider text-red-400">
                                    ID Parkir
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase
                                           tracking-wider text-red-400">
                                    Kendaraan
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase
                                           tracking-wider text-red-400">
                                    Waktu Masuk
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase
                                           tracking-wider text-red-400">
                                    Waktu Keluar
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase
                                           tracking-wider text-red-400">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase
                                           tracking-wider text-red-400">
                                    Biaya
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase
                                           tracking-wider text-red-400">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-red-950/40">

                            @forelse($transaksi as $item)

                                <tr class="transition hover:bg-red-950/10">

                                    {{-- ID --}}
                                    <td class="px-6 py-5">

                                        <span class="font-semibold text-white">
                                            {{ $item->id_parkir }}
                                        </span>

                                    </td>


                                    {{-- KENDARAAN --}}
                                    <td class="px-6 py-5">

                                        <span class="text-sm text-slate-300">
                                            {{ $item->id_kendaraan }}
                                        </span>

                                    </td>


                                    {{-- MASUK --}}
                                    <td class="px-6 py-5">

                                        <span class="text-sm text-slate-400">
                                            {{ $item->waktu_masuk }}
                                        </span>

                                    </td>


                                    {{-- KELUAR --}}
                                    <td class="px-6 py-5">

                                        <span class="text-sm text-slate-400">
                                            {{ $item->waktu_keluar ?? '-' }}
                                        </span>

                                    </td>


                                    {{-- STATUS --}}
                                    <td class="px-6 py-5">

                                        @if($item->status === 'masuk')

                                            <span class="rounded-full border
                                                         border-green-900/50
                                                         bg-green-950/40
                                                         px-3 py-1 text-xs
                                                         font-bold text-green-400">

                                                ● Masuk

                                            </span>

                                        @else

                                            <span class="rounded-full border
                                                         border-red-900/50
                                                         bg-red-950/40
                                                         px-3 py-1 text-xs
                                                         font-bold text-red-400">

                                                ● Keluar

                                            </span>

                                        @endif

                                    </td>


                                    {{-- BIAYA --}}
                                    <td class="px-6 py-5">

                                        <span class="text-sm font-semibold text-white">

                                            Rp
                                            {{ number_format($item->biaya_total ?? 0, 0, ',', '.') }}

                                        </span>

                                    </td>


                                    {{-- AKSI --}}
                                    <td class="px-6 py-5">

                                        @if($item->status === 'masuk')

                                            <form
                                                action="{{ route('petugas.transaksi.keluar', $item->id_parkir) }}"
                                                method="POST">

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="rounded-lg bg-gradient-to-r
                                                           from-red-500 to-red-800
                                                           px-4 py-2 text-xs
                                                           font-bold text-white
                                                           transition hover:from-red-400
                                                           hover:to-red-700">

                                                    Kendaraan Keluar

                                                </button>

                                            </form>

                                       @else

                                            <a
                                                href="{{ route('petugas.transaksi.struk', $item->id_parkir) }}"
                                                class="inline-flex items-center rounded-lg
                                                    bg-gradient-to-r from-red-500 to-red-800
                                                    px-4 py-2 text-xs
                                                    font-bold text-white
                                                    transition hover:from-red-400
                                                    hover:to-red-700">

                                                🧾 Cetak Struk

                                            </a>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7"
                                        class="px-6 py-12 text-center">

                                        <div class="text-4xl">
                                            🎫
                                        </div>

                                        <p class="mt-3 text-sm font-semibold text-slate-400">
                                            Belum ada transaksi
                                        </p>

                                        <p class="mt-1 text-xs text-slate-600">
                                            Transaksi kendaraan akan muncul di sini.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- FOOTER --}}
            <footer class="py-8 text-center">

                <p class="text-xs text-slate-600">
                    © {{ date('Y') }} KABASA Parking System
                </p>

            </footer>

        </div>

    </main>

</div>

</body>
</html>