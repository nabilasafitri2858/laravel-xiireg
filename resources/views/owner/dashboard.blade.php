
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Owner - KABASA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background:
                radial-gradient(circle at 85% 10%, rgba(127, 29, 29, .16), transparent 30%),
                #090909;
        }
        .card-hover { transition: .25s ease; }
        .card-hover:hover {
            transform: translateY(-3px);
            border-color: rgba(239, 68, 68, .7);
        }
        ::-webkit-scrollbar { width: 7px; height: 7px; }
        ::-webkit-scrollbar-track { background: #090909; }
        ::-webkit-scrollbar-thumb { background: #7f1d1d; border-radius: 10px; }
    </style>
</head>

<body class="min-h-screen text-white">

<div class="min-h-screen">

    {{-- SIDEBAR --}}
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
                   class="flex items-center gap-3 rounded-xl bg-gradient-to-r from-red-600 to-red-900 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-red-950/30">
                    <span>🏠</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('owner.laporan.index') }}"
                   class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-gray-400 transition hover:bg-red-950/50 hover:text-white">
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

    {{-- KONTEN UTAMA --}}
    <main class="ml-72 min-h-screen">

        {{-- TOPBAR --}}
        <header class="sticky top-0 z-20 flex min-h-16 items-center justify-between gap-4 border-b border-red-900/30 bg-black/95 px-6 backdrop-blur">
            <div>
                <p class="text-[10px] font-semibold uppercase tracking-widest text-red-500">
                    KABASA PARKING SYSTEM
                </p>
                <h2 class="text-lg font-bold">Dashboard Owner</h2>
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

            {{-- BANNER --}}
            <section class="relative overflow-hidden rounded-2xl border border-red-900/50 bg-gradient-to-r from-red-950 via-black to-black p-7 md:p-9">
                <div class="pointer-events-none absolute -right-10 -top-16 h-60 w-60 rounded-full bg-red-600/10 blur-2xl"></div>

                <div class="relative">
                    <p class="mb-2 text-xs font-semibold text-red-400">
                        Ringkasan Sistem Parkir 📊
                    </p>
                    <h3 class="text-2xl font-bold md:text-3xl">
                        Selamat Datang,
                        {{ auth()->user()->nama_lengkap ?? auth()->user()->nama ?? 'Owner' }}!
                    </h3>
                    <p class="mt-3 max-w-2xl text-sm leading-6 text-gray-400">
                        Pantau aktivitas parkir, lihat statistik transaksi,
                        dan akses laporan KABASA melalui dashboard Owner.
                    </p>
                    <a href="{{ route('owner.laporan.index') }}"
                       class="mt-5 inline-flex items-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-semibold transition hover:bg-red-700">
                        📊 Buka Laporan
                        <span>→</span>
                    </a>
                </div>
            </section>

            {{-- STATISTIK --}}
            <section>
                <div class="mb-4">
                    <h3 class="text-lg font-bold">Ringkasan Parkir</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Informasi singkat transaksi parkir.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">

                    <div class="card-hover rounded-2xl border border-red-900/40 bg-black p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-400">Total Transaksi</p>
                            <span class="rounded-xl bg-red-950 p-3">🧾</span>
                        </div>
                        <h4 class="mt-4 text-3xl font-bold">
                            {{ number_format($totalTransaksi ?? 0) }}
                        </h4>
                        <p class="mt-2 text-xs text-gray-500">Seluruh transaksi parkir</p>
                    </div>

                    <div class="card-hover rounded-2xl border border-red-900/40 bg-black p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-400">Transaksi Hari Ini</p>
                            <span class="rounded-xl bg-red-950 p-3">📅</span>
                        </div>
                        <h4 class="mt-4 text-3xl font-bold">
                            {{ number_format($transaksiHariIni ?? 0) }}
                        </h4>
                        <p class="mt-2 text-xs text-gray-500">Transaksi berdasarkan tanggal hari ini</p>
                    </div>

                    <div class="card-hover rounded-2xl border border-red-900/40 bg-black p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-400">Total Pendapatan</p>
                            <span class="rounded-xl bg-red-950 p-3">💰</span>
                        </div>
                        <h4 class="mt-4 text-2xl font-bold text-red-400">
                            Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}
                        </h4>
                        <p class="mt-2 text-xs text-gray-500">Pendapatan parkir</p>
                    </div>

                </div>
            </section>

            {{-- PANEL LAPORAN --}}
            <section class="overflow-hidden rounded-2xl border border-red-900/40 bg-black">
                <div class="flex flex-wrap items-center justify-between gap-4 border-b border-red-900/30 p-6">
                    <div>
                        <h3 class="text-lg font-bold">Laporan Parkir</h3>
                        <p class="mt-1 text-sm text-gray-400">
                            Lihat rekap transaksi berdasarkan periode yang dipilih.
                        </p>
                    </div>
                    <a href="{{ route('owner.laporan.index') }}"
                       class="rounded-xl border border-red-700/60 bg-red-950/30 px-5 py-3 text-sm font-semibold text-red-300 transition hover:bg-red-900/50 hover:text-white">
                        📑 Buka Laporan →
                    </a>
                </div>

                <div class="grid grid-cols-1 gap-4 p-6 md:grid-cols-2">
                    <div class="card-hover rounded-xl border border-zinc-800 bg-zinc-950 p-5">
                        <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-red-950 text-xl">
                            📊
                        </div>
                        <h4 class="font-semibold">Rekap Transaksi</h4>
                        <p class="mt-2 text-sm leading-6 text-gray-400">
                            Periksa data kendaraan, waktu masuk dan keluar,
                            durasi parkir, biaya, serta petugas.
                        </p>
                        <a href="{{ route('owner.laporan.index') }}"
                           class="mt-4 inline-block text-sm font-semibold text-red-400 hover:text-red-300">
                            Lihat Laporan →
                        </a>
                    </div>

                    <div class="card-hover rounded-xl border border-zinc-800 bg-zinc-950 p-5">
                        <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-red-950 text-xl">
                            🖨️
                        </div>
                        <h4 class="font-semibold">Cetak Laporan</h4>
                        <p class="mt-2 text-sm leading-6 text-gray-400">
                            Pilih tanggal laporan, kemudian cetak rekap
                            untuk kebutuhan administrasi.
                        </p>
                        <a href="{{ route('owner.laporan.index') }}"
                           class="mt-4 inline-block text-sm font-semibold text-red-400 hover:text-red-300">
                            Buka Halaman Laporan →
                        </a>
                    </div>
                </div>
            </section>

            <footer class="pb-3 text-center text-xs text-gray-600">
                © {{ date('Y') }} KABASA Parking System
            </footer>
        </div>
    </main>
</div>

</body>
</html>
