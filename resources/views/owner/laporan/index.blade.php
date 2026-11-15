
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Parkir - KABASA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background:
                radial-gradient(circle at 85% 10%, rgba(127, 29, 29, .16), transparent 30%),
                #090909;
        }
        .card-hover { transition: .25s ease; }
        .card-hover:hover {
            transform: translateY(-2px);
            border-color: rgba(239, 68, 68, .7);
        }
        ::-webkit-scrollbar { width: 7px; height: 7px; }
        ::-webkit-scrollbar-track { background: #090909; }
        ::-webkit-scrollbar-thumb { background: #7f1d1d; border-radius: 10px; }
    </style>
</head>

<body class="min-h-screen text-white">

<div class="min-h-screen">

    {{-- SIDEBAR SAMA DENGAN DASHBOARD --}}
    <aside class="fixed inset-y-0 left-0 z-30 flex w-72 flex-col border-r border-red-900/40 bg-black">

        <div class="flex h-16 items-center gap-3 border-b border-red-900/30 px-5">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-red-500 to-red-900 text-xl font-black shadow-lg shadow-red-950/50">
                K
            </div>
            <div>
                <h1 class="font-bold tracking-wide">KABASA</h1>
                <p class="text-[10px] text-red-400">Parking System</p>
            </div>
        </div>

        <div class="px-4 pt-6">
            <p class="mb-3 text-[10px] font-bold uppercase tracking-[.2em] text-red-500">
                Menu Owner
            </p>

            <nav class="space-y-2">
                <a href="{{ route('owner.dashboard') }}"
                   class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-gray-400 transition hover:bg-red-950/50 hover:text-white">
                    <span>🏠</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('owner.laporan.index') }}"
                   class="flex items-center gap-3 rounded-xl bg-gradient-to-r from-red-600 to-red-900 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-red-950/30">
                    <span>📊</span>
                    <span>Laporan</span>
                </a>
            </nav>
        </div>

        {{-- PROFIL DAN LOGOUT DI BAWAH --}}
        <div class="mt-auto border-t border-red-900/30 p-4">
            <div class="mb-4 flex items-center gap-3 rounded-xl border border-red-900/30 bg-red-950/20 p-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-red-500 to-red-900 font-bold">
                    {{ strtoupper(substr(auth()->user()->nama_lengkap ?? auth()->user()->nama ?? 'O', 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="truncate text-sm font-semibold">
                        {{ auth()->user()->nama_lengkap ?? auth()->user()->nama ?? 'Owner' }}
                    </p>
                    <p class="text-xs text-red-400">Owner</p>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="w-full rounded-xl px-3 py-2 text-left text-sm text-gray-400 transition hover:bg-red-950/50 hover:text-red-400">
                    ↪ Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- KONTEN UTAMA: UKURAN SAMA DENGAN DASHBOARD --}}
    <main class="ml-72 min-h-screen">

        {{-- TOPBAR --}}
        <header class="sticky top-0 z-20 flex min-h-16 items-center justify-between gap-4 border-b border-red-900/30 bg-black/95 px-6 backdrop-blur">
            <div>
                <p class="text-[10px] font-semibold uppercase tracking-widest text-red-500">
                    KABASA PARKING SYSTEM
                </p>
                <h2 class="text-lg font-bold">Laporan Parkir</h2>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-sm font-semibold">
                        {{ auth()->user()->nama_lengkap ?? auth()->user()->nama ?? 'Owner' }}
                    </p>
                    <p class="text-xs text-red-400">Owner</p>
                </div>
                <div class="flex h-10 w-10 items-center justify-center rounded-full border border-red-700 bg-gradient-to-br from-red-500 to-red-900 font-bold">
                    {{ strtoupper(substr(auth()->user()->nama_lengkap ?? auth()->user()->nama ?? 'O', 0, 1)) }}
                </div>
            </div>
        </header>

        <div class="space-y-7 p-6 md:p-8">

            {{-- JUDUL HALAMAN --}}
            <section class="relative overflow-hidden rounded-2xl border border-red-900/50 bg-gradient-to-r from-red-950 via-black to-black p-7 md:p-9">
                <div class="pointer-events-none absolute -right-10 -top-16 h-60 w-60 rounded-full bg-red-600/10 blur-2xl"></div>

                <div class="relative">
                    <p class="mb-2 text-xs font-semibold text-red-400">
                        OWNER / LAPORAN
                    </p>
                    <h3 class="text-2xl font-bold md:text-3xl">
                        Laporan Parkir
                    </h3>
                    <p class="mt-3 max-w-2xl text-sm leading-6 text-gray-400">
                        Pantau transaksi, kendaraan, dan pendapatan parkir
                        berdasarkan periode yang kamu pilih.
                    </p>
                </div>
            </section>

            {{-- FILTER TANGGAL --}}
            <section class="rounded-2xl border border-red-900/40 bg-black p-5 md:p-6">
                <div class="mb-5">
                    <h3 class="font-bold">🔎 Filter Periode Laporan</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Pilih tanggal mulai dan tanggal selesai.
                    </p>
                </div>

                <form action="{{ route('owner.laporan.index') }}" method="GET"
                      class="grid grid-cols-1 items-end gap-4 md:grid-cols-2 xl:grid-cols-4">

                    <div>
                        <label class="block text-sm text-gray-300 mb-2">
                            Tanggal Mulai
                        </label>

                        <input type="date"
                            name="tanggal_mulai"
                            value="{{ $tanggalMulai }}"
                            class="w-full rounded-xl bg-gray-900 border border-gray-700
                                    text-white px-3 py-3 focus:border-red-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-300 mb-2">
                            Tanggal Selesai
                        </label>

                        <input type="date"
                            name="tanggal_selesai"
                            value="{{ $tanggalSelesai }}"
                            class="w-full rounded-xl bg-gray-900 border border-gray-700
                                    text-white px-3 py-3 focus:border-red-500 focus:outline-none">
                    </div>
                    <button type="submit"
                            class="rounded-xl bg-red-600 px-5 py-3 text-sm font-semibold transition hover:bg-red-700">
                        Terapkan Filter
                    </button>

                    <a href="{{ route('owner.laporan.index') }}"
                       class="rounded-xl border border-zinc-700 px-5 py-3 text-center text-sm font-semibold transition hover:border-red-700 hover:bg-red-950/30">
                        Reset
                    </a>
                </form>
            </section>

            {{-- STATISTIK LAPORAN --}}
            <section>
                <div class="mb-4">
                    <h3 class="text-lg font-bold">Ringkasan Laporan</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Statistik sesuai periode yang dipilih.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

                    <div class="card-hover rounded-2xl border border-red-900/40 bg-black p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-400">Total Transaksi</p>
                            <span class="rounded-xl bg-red-950 p-3">🧾</span>
                        </div>
                        <h4 class="mt-4 text-3xl font-bold">
                            {{ number_format($totalTransaksi) }}
                        </h4>
                        <p class="mt-2 text-xs text-gray-500">Seluruh transaksi pada periode ini</p>
                    </div>

                    <div class="card-hover rounded-2xl border border-red-900/40 bg-black p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-400">Total Pendapatan</p>
                            <span class="rounded-xl bg-red-950 p-3">💰</span>
                        </div>
                        <h4 class="mt-4 text-2xl font-bold text-red-400">
                            Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </h4>
                        <p class="mt-2 text-xs text-gray-500">Transaksi berstatus keluar</p>
                    </div>

                    <div class="card-hover rounded-2xl border border-red-900/40 bg-black p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-400">Kendaraan Selesai</p>
                            <span class="rounded-xl bg-green-950 p-3">🚗</span>
                        </div>
                        <h4 class="mt-4 text-3xl font-bold text-green-400">
                            {{ number_format($kendaraanSelesai) }}
                        </h4>
                        <p class="mt-2 text-xs text-gray-500">Sudah keluar dari parkiran</p>
                    </div>

                    <div class="card-hover rounded-2xl border border-red-900/40 bg-black p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-400">Masih Parkir</p>
                            <span class="rounded-xl bg-yellow-950 p-3">🅿️</span>
                        </div>
                        <h4 class="mt-4 text-3xl font-bold text-yellow-400">
                            {{ number_format($kendaraanMasihParkir) }}
                        </h4>
                        <p class="mt-2 text-xs text-gray-500">Belum menyelesaikan parkir</p>
                    </div>

                </div>
            </section>

            {{-- TABEL TRANSAKSI --}}
            <section class="overflow-hidden rounded-2xl border border-red-900/40 bg-black">

                <div class="flex flex-wrap items-center justify-between gap-4 border-b border-red-900/30 p-5 md:p-6">
                    <div>
                        <h3 class="text-lg font-bold">Data Transaksi Parkir</h3>
                        <p class="mt-1 text-sm text-gray-400">
                            {{ \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') }}
                            sampai
                            {{ \Carbon\Carbon::parse($tanggalSelesai)->format('d/m/Y') }}
                        </p>
                    </div>

                    <a href="{{ route('owner.laporan.cetak', ['tanggal_mulai' => $tanggalMulai, 'tanggal_selesai' => $tanggalSelesai]) }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-semibold transition hover:bg-red-700">
                        🖨️ Cetak Laporan
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[1050px] text-left text-sm">
                        <thead class="bg-zinc-950 text-xs uppercase tracking-wider text-gray-400">
                            <tr>
                                <th class="px-5 py-4">No.</th>
                                <th class="px-5 py-4">ID Parkir</th>
                                <th class="px-5 py-4">Pemilik</th>
                                <th class="px-5 py-4">Kendaraan</th>
                                <th class="px-5 py-4">Waktu Masuk</th>
                                <th class="px-5 py-4">Waktu Keluar</th>
                                <th class="px-5 py-4">Durasi</th>
                                <th class="px-5 py-4">Biaya</th>
                                <th class="px-5 py-4">Petugas</th>
                                <th class="px-5 py-4">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-zinc-800">
                            @forelse ($transaksi as $item)
                                <tr class="transition hover:bg-red-950/20">
                                    <td class="px-5 py-4 text-gray-400">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-5 py-4 font-semibold">
                                        {{ $item->id_parkir }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $item->pemilik ?? '-' }}
                                    </td>

                                    <td class="px-5 py-4">
                                        <p>{{ $item->jenis_kendaraan ?? '-' }}</p>
                                        <p class="mt-1 text-xs text-gray-500">
                                            {{ $item->warna ?? '-' }}
                                        </p>
                                    </td>

                                    <td class="whitespace-nowrap px-5 py-4">
                                        {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('d/m/Y H:i') }}
                                    </td>

                                    <td class="whitespace-nowrap px-5 py-4">
                                        {{ $item->waktu_keluar
                                            ? \Carbon\Carbon::parse($item->waktu_keluar)->format('d/m/Y H:i')
                                            : '-' }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $item->durasi_jam !== null ? $item->durasi_jam . ' jam' : '-' }}
                                    </td>

                                    <td class="whitespace-nowrap px-5 py-4">
                                        {{ $item->biaya_total !== null
                                            ? 'Rp ' . number_format($item->biaya_total, 0, ',', '.')
                                            : '-' }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $item->nama_lengkap ?? '-' }}
                                    </td>

                                    <td class="px-5 py-4">
                                        @if ($item->status === 'masuk')
                                            <span class="rounded-full bg-yellow-500/10 px-3 py-1 text-xs font-semibold text-yellow-400">
                                                Masuk
                                            </span>
                                        @else
                                            <span class="rounded-full bg-green-500/10 px-3 py-1 text-xs font-semibold text-green-400">
                                                Keluar
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-5 py-14 text-center">
                                        <div class="text-3xl">📭</div>
                                        <p class="mt-3 font-semibold">Belum ada transaksi</p>
                                        <p class="mt-2 text-sm text-gray-500">
                                            Tidak ada data pada periode yang dipilih.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="border-t border-zinc-800 p-4 text-xs text-gray-500">
                    Data laporan ditampilkan berdasarkan tanggal waktu masuk kendaraan.
                </div>
            </section>

            <footer class="pb-3 text-center text-xs text-gray-600">
                © {{ date('Y') }} KABASA Parking System. All rights reserved.
            </footer>

        </div>
    </main>
</div>

</body>
</html>
