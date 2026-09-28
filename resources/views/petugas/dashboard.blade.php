<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas - KABASA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-slate-100 text-slate-800">


<div class="min-h-screen flex">


    {{-- =====================================================
         SIDEBAR PETUGAS
    ====================================================== --}}

    <aside class="fixed left-0 top-0 z-40 flex h-screen w-72 flex-col bg-slate-950 text-white">


        {{-- LOGO --}}

        <div class="flex h-24 items-center border-b border-slate-800 px-7">

            <div class="flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white text-xl font-black text-slate-950">
                    K
                </div>


                <div>

                    <h1 class="text-xl font-bold tracking-wide">
                        KABASA
                    </h1>

                    <p class="text-xs text-slate-400">
                        Parking System
                    </p>

                </div>

            </div>

        </div>



        {{-- MENU --}}

        <nav class="flex-1 px-4 py-6">


            <p class="mb-3 px-3 text-[11px] font-bold uppercase tracking-[0.15em] text-slate-500">
                Menu Petugas
            </p>



            {{-- DASHBOARD --}}

            <a href="{{ route('petugas.dashboard') }}"
                class="mb-2 flex items-center gap-3 rounded-xl bg-white px-4 py-3.5 text-sm font-semibold text-slate-950 shadow-lg">

                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100">
                    🏠
                </span>

                Dashboard

            </a>



            {{-- TRANSAKSI --}}

            <a href="#"
                class="group mb-2 flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-300 transition hover:bg-slate-800 hover:text-white">

                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-900 group-hover:bg-slate-700">
                    🎫
                </span>

                Transaksi

            </a>



            {{-- CETAK STRUK --}}

            <a href="#"
                class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-300 transition hover:bg-slate-800 hover:text-white">

                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-900 group-hover:bg-slate-700">
                    🧾
                </span>

                Cetak Struk Parkir

            </a>


        </nav>



        {{-- USER + LOGOUT --}}

        <div class="border-t border-slate-800 p-4">


            <div class="mb-3 flex items-center gap-3 rounded-xl bg-slate-900 p-3">


                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-white font-bold text-slate-950">

                    {{ strtoupper(substr(auth()->user()->nama, 0, 1)) }}

                </div>


                <div class="min-w-0">

                    <p class="truncate text-sm font-semibold text-white">

                        {{ auth()->user()->nama }}

                    </p>


                    <p class="text-xs capitalize text-slate-400">

                        {{ auth()->user()->role }}

                    </p>

                </div>


            </div>



            {{-- LOGOUT --}}

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-400 transition hover:bg-red-500/10 hover:text-red-400">

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

        <header class="sticky top-0 z-30 flex h-24 items-center justify-between border-b border-slate-200 bg-white/90 px-8 backdrop-blur">


            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">

                    KABASA Parking System

                </p>


                <h2 class="mt-1 text-xl font-bold text-slate-900">

                    Dashboard Petugas

                </h2>

            </div>



           <div class="flex items-center gap-4">

                {{-- Nama dan Role --}}
                <div class="text-right">

                    <p class="text-sm font-semibold text-slate-800">
                        {{ auth()->user()->nama_lengkap }}
                    </p>

                    <p class="text-xs capitalize text-slate-400">
                        {{ auth()->user()->role }}
                    </p>

                </div>


                {{-- Foto/Avatar --}}
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-950 text-sm font-bold text-white shadow-lg">

                    {{ strtoupper(substr(auth()->user()->nama_lengkap, 0, 1)) }}

                </div>

            </div>

        </header>



        {{-- CONTENT --}}

        <div class="p-8">



            {{-- WELCOME BANNER --}}

            <div class="relative mb-8 overflow-hidden rounded-2xl bg-slate-950 p-8 text-white shadow-xl">


                <div class="relative z-10">


                    <p class="mb-2 text-sm font-medium text-slate-400">

                        Selamat datang kembali 👋

                    </p>


                    <h1 class="text-3xl font-bold">

                        Halo, {{ auth()->user()->nama }}!

                    </h1>


                    <p class="mt-3 max-w-xl text-sm leading-6 text-slate-400">

                        Kelola transaksi parkir dan proses kendaraan
                        melalui dashboard petugas KABASA.

                    </p>


                </div>



                {{-- DEKORASI --}}

                <div class="absolute -right-10 -top-20 h-64 w-64 rounded-full bg-white/5"></div>

                <div class="absolute -bottom-32 right-40 h-72 w-72 rounded-full bg-white/5"></div>


            </div>



            {{-- INFORMASI PARKIR --}}

            <div class="mb-8">


                <div class="mb-5">

                    <h3 class="text-lg font-bold text-slate-900">

                        Informasi Parkir

                    </h3>


                    <p class="mt-1 text-sm text-slate-500">

                        Ringkasan aktivitas parkir hari ini.

                    </p>

                </div>



                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">



                    {{-- TRANSAKSI --}}

                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">


                        <div class="flex items-start justify-between">


                            <div>


                                <p class="text-sm font-medium text-slate-500">

                                    Transaksi Hari Ini

                                </p>


                                <h3 class="mt-3 text-3xl font-bold text-slate-900">

                                    0

                                </h3>


                                <p class="mt-2 text-xs text-slate-400">

                                    Transaksi parkir

                                </p>


                            </div>



                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                                🎫

                            </div>


                        </div>


                    </div>



                    {{-- KENDARAAN MASUK --}}

                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">


                        <div class="flex items-start justify-between">


                            <div>


                                <p class="text-sm font-medium text-slate-500">

                                    Kendaraan Masuk

                                </p>


                                <h3 class="mt-3 text-3xl font-bold text-slate-900">

                                    0

                                </h3>


                                <p class="mt-2 text-xs text-slate-400">

                                    Kendaraan hari ini

                                </p>


                            </div>



                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                                🚗

                            </div>


                        </div>


                    </div>



                    {{-- KENDARAAN KELUAR --}}

                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">


                        <div class="flex items-start justify-between">


                            <div>


                                <p class="text-sm font-medium text-slate-500">

                                    Kendaraan Keluar

                                </p>


                                <h3 class="mt-3 text-3xl font-bold text-slate-900">

                                    0

                                </h3>


                                <p class="mt-2 text-xs text-slate-400">

                                    Kendaraan hari ini

                                </p>


                            </div>



                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                                🚘

                            </div>


                        </div>


                    </div>


                </div>


            </div>



            {{-- MENU OPERASIONAL --}}

            <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">


                <div>


                    <h3 class="text-lg font-bold text-slate-900">

                        Menu Operasional

                    </h3>


                    <p class="mt-1 text-sm text-slate-500">

                        Gunakan menu berikut untuk mengelola aktivitas parkir.

                    </p>


                </div>



                <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">



                    {{-- TRANSAKSI --}}

                    <a href="#"
                        class="group rounded-xl border border-slate-200 p-6 transition hover:-translate-y-1 hover:bg-slate-50 hover:shadow-md">


                        <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-slate-100 text-3xl transition group-hover:scale-110">

                            🎫

                        </div>


                        <h4 class="mt-4 text-lg font-bold text-slate-900">

                            Transaksi Parkir

                        </h4>


                        <p class="mt-2 text-sm leading-6 text-slate-400">

                            Catat kendaraan masuk dan keluar,
                            serta kelola transaksi parkir.

                        </p>


                        <div class="mt-5 text-sm font-semibold text-slate-900">

                            Buka transaksi →

                        </div>


                    </a>



                    {{-- CETAK STRUK --}}

                    <a href="#"
                        class="group rounded-xl border border-slate-200 p-6 transition hover:-translate-y-1 hover:bg-slate-50 hover:shadow-md">


                        <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-slate-100 text-3xl transition group-hover:scale-110">

                            🧾

                        </div>


                        <h4 class="mt-4 text-lg font-bold text-slate-900">

                            Cetak Struk Parkir

                        </h4>


                        <p class="mt-2 text-sm leading-6 text-slate-400">

                            Cetak bukti transaksi parkir
                            setelah kendaraan melakukan transaksi.

                        </p>


                        <div class="mt-5 text-sm font-semibold text-slate-900">

                            Cetak struk →

                        </div>


                    </a>


                </div>


            </div>



            {{-- STATUS SISTEM --}}

            <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">


                <div class="flex items-center justify-between">


                    <div>


                        <h3 class="text-lg font-bold text-slate-900">

                            Status Sistem

                        </h3>


                        <p class="mt-1 text-sm text-slate-500">

                            Kondisi sistem parkir saat ini.

                        </p>


                    </div>



                    <span class="rounded-full bg-slate-100 px-4 py-2 text-xs font-bold text-slate-700">

                        ● Sistem Aktif

                    </span>


                </div>


                <div class="mt-6 border-t border-slate-100 pt-5">


                    <div class="flex items-center gap-4">


                        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-100">

                            ✓

                        </div>


                        <div>


                            <p class="text-sm font-semibold text-slate-900">

                                Sistem parkir siap digunakan

                            </p>


                            <p class="mt-1 text-xs text-slate-400">

                                Silakan pilih menu transaksi untuk mulai bekerja.

                            </p>

                        </div>


                    </div>


                </div>


            </div>



            {{-- FOOTER --}}

            <footer class="py-8 text-center">

                <p class="text-xs text-slate-400">

                    © {{ date('Y') }} KABASA Parking System

                </p>

            </footer>


        </div>


    </main>


</div>


</body>

</html> 