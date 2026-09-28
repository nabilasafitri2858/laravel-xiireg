<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Owner - KABASA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-slate-100 text-slate-800">


    <div class="min-h-screen flex">


        {{-- =====================================================
             SIDEBAR
        ====================================================== --}}

        <aside class="fixed left-0 top-0 z-40 flex h-screen w-64 flex-col bg-slate-950 text-white">


            {{-- LOGO --}}

            <div class="flex h-24 items-center border-b border-slate-800 px-6">

                <div class="flex items-center gap-3">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-lg font-black text-slate-950">
                        K
                    </div>

                    <div>

                        <h1 class="text-lg font-black tracking-wide">
                            KABASA
                        </h1>

                        <p class="text-[10px] uppercase tracking-[0.25em] text-slate-500">
                            Parking System
                        </p>

                    </div>

                </div>

            </div>



            {{-- MENU --}}

            <nav class="flex-1 px-4 py-6">


                <p class="mb-3 px-3 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">
                    Menu Owner
                </p>


                {{-- DASHBOARD --}}

                <a href="/owner/dashboard"
                    class="mb-2 flex items-center gap-3 rounded-xl bg-white px-4 py-3 text-sm font-semibold text-slate-950 shadow-lg">

                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100">
                        🏠
                    </span>

                    Dashboard

                </a>



                {{-- REKAP TRANSAKSI --}}

                <a href="#"
                    class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-300 transition hover:bg-slate-800 hover:text-white">

                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-900 group-hover:bg-slate-700">
                        📊
                    </span>

                    Rekap Transaksi

                </a>


            </nav>



            {{-- USER SIDEBAR --}}

            <div class="border-t border-slate-800 p-4">


                <div class="mb-3 flex items-center gap-3 rounded-xl bg-slate-900 p-3">


                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-white font-bold text-slate-950">

                        {{ strtoupper(substr(auth()->user()->nama_lengkap, 0, 1)) }}

                    </div>


                    <div class="min-w-0">

                        <p class="truncate text-sm font-semibold text-white">

                            {{ auth()->user()->nama_lengkap }}

                        </p>

                        <p class="text-xs capitalize text-slate-500">

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

        <main class="ml-64 min-h-screen flex-1">


            {{-- TOPBAR --}}

            <header class="sticky top-0 z-30 flex h-24 items-center justify-between border-b border-slate-200 bg-white/90 px-8 backdrop-blur">


                <div>

                    <p class="text-xs font-medium text-slate-400">
                        KABASA Parking System
                    </p>

                    <h2 class="mt-1 text-xl font-bold text-slate-950">
                        Dashboard Owner
                    </h2>

                </div>



                {{-- NAMA USER --}}

                <div class="flex items-center gap-4">


                    <div class="text-right">

                        <p class="text-sm font-semibold text-slate-800">

                            {{ auth()->user()->nama_lengkap }}

                        </p>

                        <p class="text-xs capitalize text-slate-400">

                            {{ auth()->user()->role }}

                        </p>

                    </div>


                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-950 text-sm font-bold text-white shadow-lg">

                        {{ strtoupper(substr(auth()->user()->nama_lengkap, 0, 1)) }}

                    </div>


                </div>


            </header>



            {{-- =====================================================
                 ISI DASHBOARD
            ====================================================== --}}

            <div class="p-8">


                {{-- WELCOME --}}

                <div class="relative mb-8 overflow-hidden rounded-3xl bg-slate-950 p-8 shadow-xl">


                    {{-- DEKORASI --}}

                    <div class="absolute -right-20 -top-32 h-80 w-80 rounded-full border border-white/5"></div>

                    <div class="absolute -bottom-40 right-32 h-80 w-80 rounded-full bg-white/[0.03]"></div>


                    <div class="relative">

                        <p class="mb-2 text-sm font-medium text-slate-400">
                            Ringkasan sistem parkir 📊
                        </p>

                        <h1 class="text-3xl font-bold text-white">
                            Selamat Datang, {{ auth()->user()->nama_lengkap }}!
                        </h1>

                        <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-400">

                            Pantau aktivitas transaksi dan lihat
                            rekap parkir KABASA dengan mudah melalui
                            dashboard Owner.

                        </p>

                    </div>


                </div>



                {{-- =================================================
                     CARD STATISTIK
                ================================================== --}}

                <div class="mb-8">


                    <div class="mb-5">

                        <h3 class="text-lg font-bold text-slate-950">
                            Ringkasan Parkir
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Informasi singkat transaksi parkir.
                        </p>

                    </div>



                    <div class="grid grid-cols-1 gap-5 md:grid-cols-3">


                        {{-- TOTAL TRANSAKSI --}}

                        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">


                            <div class="flex items-start justify-between">


                                <div>

                                    <p class="text-sm font-medium text-slate-500">
                                        Total Transaksi
                                    </p>

                                    <h3 class="mt-3 text-3xl font-bold text-slate-950">
                                        0
                                    </h3>

                                    <p class="mt-2 text-xs text-slate-400">
                                        Seluruh transaksi parkir
                                    </p>

                                </div>


                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">
                                    🎫
                                </div>


                            </div>


                        </div>



                        {{-- TRANSAKSI HARI INI --}}

                        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">


                            <div class="flex items-start justify-between">


                                <div>

                                    <p class="text-sm font-medium text-slate-500">
                                        Transaksi Hari Ini
                                    </p>

                                    <h3 class="mt-3 text-3xl font-bold text-slate-950">
                                        0
                                    </h3>

                                    <p class="mt-2 text-xs text-slate-400">
                                        Transaksi pada hari ini
                                    </p>

                                </div>


                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">
                                    📅
                                </div>


                            </div>


                        </div>



                        {{-- PENDAPATAN --}}

                        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">


                            <div class="flex items-start justify-between">


                                <div>

                                    <p class="text-sm font-medium text-slate-500">
                                        Pendapatan
                                    </p>

                                    <h3 class="mt-3 text-2xl font-bold text-slate-950">
                                        Rp 0
                                    </h3>

                                    <p class="mt-2 text-xs text-slate-400">
                                        Total pendapatan parkir
                                    </p>

                                </div>


                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">
                                    💰
                                </div>


                            </div>


                        </div>


                    </div>

                </div>



                {{-- =================================================
                     REKAP TRANSAKSI
                ================================================== --}}

                <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">


                    <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">


                        <div>

                            <h3 class="text-lg font-bold text-slate-950">
                                Rekap Transaksi
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">

                                Lihat transaksi berdasarkan
                                periode waktu tertentu.

                            </p>

                        </div>


                        <a href="#"
                            class="inline-flex items-center justify-center rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">

                            📊 Lihat Rekap

                        </a>


                    </div>



                    {{-- FILTER --}}

                    <div class="mt-7 grid grid-cols-1 gap-4 md:grid-cols-3">


                        {{-- PERIODE --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-600">
                                Periode
                            </label>

                            <select
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-slate-950 focus:ring-4 focus:ring-slate-950/5">

                                <option>Hari Ini</option>
                                <option>Kemarin</option>
                                <option>Minggu Ini</option>
                                <option>Bulan Ini</option>
                                <option>Tahun Ini</option>

                            </select>

                        </div>



                        {{-- DARI --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-600">
                                Dari Tanggal
                            </label>

                            <input
                                type="date"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-slate-950 focus:ring-4 focus:ring-slate-950/5">

                        </div>



                        {{-- SAMPAI --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-600">
                                Sampai Tanggal
                            </label>

                            <input
                                type="date"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-slate-950 focus:ring-4 focus:ring-slate-950/5">

                        </div>


                    </div>



                    {{-- TABEL RINGKASAN --}}

                    <div class="mt-7 overflow-hidden rounded-xl border border-slate-200">


                        <table class="w-full text-left text-sm">


                            <thead class="bg-slate-50">

                                <tr>

                                    <th class="px-5 py-4 font-semibold text-slate-600">
                                        Keterangan
                                    </th>

                                    <th class="px-5 py-4 font-semibold text-slate-600">
                                        Jumlah
                                    </th>

                                    <th class="px-5 py-4 font-semibold text-slate-600">
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                <tr class="border-t border-slate-200">

                                    <td class="px-5 py-4 text-slate-600">
                                        Total transaksi
                                    </td>

                                    <td class="px-5 py-4 font-bold text-slate-950">
                                        0
                                    </td>

                                    <td class="px-5 py-4">

                                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
                                            Belum ada data
                                        </span>

                                    </td>

                                </tr>



                                <tr class="border-t border-slate-200">

                                    <td class="px-5 py-4 text-slate-600">
                                        Total pendapatan
                                    </td>

                                    <td class="px-5 py-4 font-bold text-slate-950">
                                        Rp 0
                                    </td>

                                    <td class="px-5 py-4">

                                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
                                            Belum ada data
                                        </span>

                                    </td>

                                </tr>


                            </tbody>


                        </table>


                    </div>


                </div>



                {{-- =================================================
                     INFORMASI OWNER
                ================================================== --}}

                <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">


                    <div class="flex items-start gap-4">


                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-xl">
                            💡
                        </div>


                        <div>

                            <h3 class="font-bold text-slate-950">
                                Informasi Owner
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500">

                                Gunakan menu <b>Rekap Transaksi</b>
                                untuk melihat data transaksi parkir
                                berdasarkan waktu yang dibutuhkan.

                            </p>

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