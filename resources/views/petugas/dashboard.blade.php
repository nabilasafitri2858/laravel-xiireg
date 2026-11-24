```php
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas - KABASA</title>

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
            transform: translateY(-4px);
            border-color: rgba(239, 68, 68, 0.55);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.35);
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
         SIDEBAR PETUGAS
    ====================================================== --}}

   <aside class="fixed left-0 top-0 z-[9999] flex h-screen w-72 flex-col
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
                      bg-gradient-to-r from-red-500 to-red-800
                      px-4 py-3.5 text-sm font-semibold text-white
                      shadow-lg shadow-red-950/30">

                <span class="flex h-8 w-8 items-center justify-center
                             rounded-lg bg-white/10">
                    🏠
                </span>

                Dashboard

            </a>


           {{-- TRANSAKSI --}}
            <a href="{{ route('petugas.transaksi') }}"
            class="group mb-2 flex items-center gap-3 rounded-xl
                    px-4 py-3 text-sm text-slate-300
                    transition hover:bg-red-950/60 hover:text-white">

                <span class="flex h-8 w-8 items-center justify-center
                            rounded-lg bg-red-950/70
                            group-hover:bg-red-800">
                    🎫
                </span>

                Transaksi

            </a>


                  {{-- CETAK STRUK --}}
                    <a href="{{ url('/petugas/transaksi') }}"
                    class="group mb-2 flex items-center gap-3 rounded-xl
                            px-4 py-3 text-sm text-slate-300
                            transition hover:bg-red-950/60 hover:text-white">

                        <span class="flex h-8 w-8 items-center justify-center
                                    rounded-lg bg-red-950/70
                                    group-hover:bg-red-800">
                            🧾
                        </span>

                        <span>
                            Cetak Struk Parkir
                        </span>

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

                    <span>
                        ↪
                    </span>

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
                    Dashboard Petugas
                </h2>

            </div>


            {{-- NAMA DAN ROLE --}}
            <div class="flex items-center gap-4">

                <div class="text-right">

                    <p class="text-sm font-semibold text-white">
                        {{ auth()->user()->nama_lengkap ?? auth()->user()->nama }}
                    </p>

                    <p class="text-xs capitalize text-red-400">
                        {{ auth()->user()->role }}
                    </p>

                </div>


              {{-- AVATAR --}}
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


            {{-- WELCOME BANNER --}}
            <div class="relative mb-8 overflow-hidden rounded-2xl
                        border border-red-900/40
                        bg-gradient-to-br from-red-950 via-black to-black
                        p-8 shadow-xl red-glow">

                <div class="relative z-10">

                    <p class="mb-2 text-sm font-medium text-red-400">
                        Selamat datang kembali 👋
                    </p>

                    <h1 class="text-3xl font-bold text-white">
                        Halo, {{ auth()->user()->nama_lengkap ?? auth()->user()->nama ?? 'Petugas' }}!
                    </h1>

                    <p class="mt-3 max-w-xl text-sm leading-6 text-slate-400">
                        Kelola transaksi parkir dan proses kendaraan
                        melalui dashboard petugas KABASA.
                    </p>

                </div>


                {{-- DEKORASI --}}
                <div class="absolute -right-10 -top-20 h-64 w-64
                            rounded-full bg-red-500/10"></div>

                <div class="absolute -bottom-32 right-40 h-72 w-72
                            rounded-full bg-red-900/20"></div>

            </div>


            {{-- INFORMASI PARKIR --}}
            <div class="mb-8">

                <div class="mb-5">

                    <h3 class="text-lg font-bold text-white">
                        Informasi Parkir
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Ringkasan aktivitas parkir hari ini.
                    </p>

                </div>


                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">


                    {{-- TRANSAKSI --}}
                    <div class="card-hover rounded-2xl border border-red-950/60
                                bg-black p-6 shadow-lg red-glow">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-400">
                                    Transaksi Hari Ini
                                </p>

                                <h3 class="mt-3 text-3xl font-bold text-white">
                                    0
                                </h3>

                                <p class="mt-2 text-xs text-slate-500">
                                    Transaksi parkir
                                </p>

                            </div>


                            <div class="flex h-12 w-12 items-center
                                        justify-center rounded-xl
                                        bg-red-950/70 text-2xl">
                                🎫
                            </div>

                        </div>

                    </div>


                    {{-- KENDARAAN MASUK --}}
                    <div class="card-hover rounded-2xl border border-red-950/60
                                bg-black p-6 shadow-lg red-glow">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-400">
                                    Kendaraan Masuk
                                </p>

                                <h3 class="mt-3 text-3xl font-bold text-white">
                                    0
                                </h3>

                                <p class="mt-2 text-xs text-slate-500">
                                    Kendaraan hari ini
                                </p>

                            </div>


                            <div class="flex h-12 w-12 items-center
                                        justify-center rounded-xl
                                        bg-red-950/70 text-2xl">
                                🚗
                            </div>

                        </div>

                    </div>


                    {{-- KENDARAAN KELUAR --}}
                    <div class="card-hover rounded-2xl border border-red-950/60
                                bg-black p-6 shadow-lg red-glow">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-400">
                                    Kendaraan Keluar
                                </p>

                                <h3 class="mt-3 text-3xl font-bold text-white">
                                    0
                                </h3>

                                <p class="mt-2 text-xs text-slate-500">
                                    Kendaraan hari ini
                                </p>

                            </div>


                            <div class="flex h-12 w-12 items-center
                                        justify-center rounded-xl
                                        bg-red-950/70 text-2xl">
                                🚘
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- MENU OPERASIONAL --}}
            <div class="rounded-2xl border border-red-950/60
                        bg-black p-7 shadow-lg red-glow">

                <div>

                    <h3 class="text-lg font-bold text-white">
                        Menu Operasional
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Gunakan menu berikut untuk mengelola aktivitas parkir.
                    </p>

                </div>


                <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">


                    {{-- TRANSAKSI --}}
                   <a href="{{ route('petugas.transaksi') }}"
                    class="card-hover group rounded-xl
                            border border-red-950/60 bg-red-950/10
                            p-6 transition
                            hover:bg-red-950/30">

                        <div class="flex h-14 w-14 items-center
                                    justify-center rounded-xl
                                    bg-red-950/70 text-3xl
                                    group-hover:bg-red-800">
                            🎫
                        </div>

                        <h4 class="mt-4 text-lg font-bold text-white">
                            Transaksi Parkir
                        </h4>

                        <p class="mt-2 text-sm leading-6 text-slate-400">
                            Catat kendaraan masuk dan keluar,
                            serta kelola transaksi parkir.
                        </p>

                        <div class="mt-5 text-sm font-semibold text-red-400">
                            Buka transaksi →
                        </div>

                    </a>


                   {{-- CETAK STRUK --}}
                    <a href="{{ url('/petugas/transaksi') }}"
                    class="card-hover group rounded-xl
                            border border-red-950/60 bg-red-950/10
                            p-6 transition
                            hover:bg-red-950/30">

                        <div class="flex h-14 w-14 items-center
                                    justify-center rounded-xl
                                    bg-red-950/70 text-3xl
                                    group-hover:bg-red-800">
                            🧾
                        </div>

                        <h4 class="mt-4 text-lg font-bold text-white">
                            Cetak Struk Parkir
                        </h4>

                        <p class="mt-2 text-sm leading-6 text-slate-400">
                            Cetak bukti transaksi parkir
                            setelah kendaraan melakukan transaksi.
                        </p>

                        <div class="mt-5 text-sm font-semibold text-red-400">
                            Cetak struk →
                        </div>

                    </a>
                </div>

            </div>


            {{-- STATUS SISTEM --}}
            <div class="mt-6 rounded-2xl border border-red-950/60
                        bg-black p-7 shadow-lg red-glow">

                <div class="flex items-center justify-between">

                    <div>

                        <h3 class="text-lg font-bold text-white">
                            Status Sistem
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Kondisi sistem parkir saat ini.
                        </p>

                    </div>


                    <span class="rounded-full border border-green-900/50
                                 bg-green-950/40 px-4 py-2
                                 text-xs font-bold text-green-400">

                        ● Sistem Aktif

                    </span>

                </div>


                <div class="mt-6 border-t border-red-950/50 pt-5">

                    <div class="flex items-center gap-4">

                        <div class="flex h-11 w-11 items-center
                                    justify-center rounded-full
                                    bg-green-950/50 text-green-400">
                            ✓
                        </div>

                        <div>

                            <p class="text-sm font-semibold text-white">
                                Sistem parkir siap digunakan
                            </p>

                            <p class="mt-1 text-xs text-slate-500">
                                Silakan pilih menu transaksi untuk mulai bekerja.
                            </p>

                        </div>

                    </div>

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

