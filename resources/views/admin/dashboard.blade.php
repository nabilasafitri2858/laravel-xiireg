<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - KABASA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        /* =====================================================
           KABASA PARKING SYSTEM
           BLACK × RED ADMIN DASHBOARD
        ====================================================== */

        * {
            scrollbar-width: thin;
            scrollbar-color: #dc2626 #080808;
        }

        /* SCROLLBAR SIDEBAR */
            .sidebar-scroll {
                overflow-y: auto;
                overflow-x: hidden;
            }

            .sidebar-scroll::-webkit-scrollbar {
                width: 8px;
            }

            .sidebar-scroll::-webkit-scrollbar-track {
                background: #080808;
            }

            .sidebar-scroll::-webkit-scrollbar-thumb {
                background: linear-gradient(
                    180deg,
                    #ef4444,
                    #991b1b
                );
                border-radius: 10px;
                border: 2px solid #080808;
            }

            .sidebar-scroll::-webkit-scrollbar-thumb:hover {
                background: #ef4444;
                box-shadow: 0 0 10px rgba(239, 68, 68, 0.7);
            }

        body {
            background:
                radial-gradient(
                    circle at 80% 5%,
                    rgba(220, 38, 38, 0.12),
                    transparent 28%
                ),
                #050505 !important;

            color: #e5e5e5;
        }


        /* =====================================================
           SIDEBAR
        ====================================================== */

        aside {
            background:
                linear-gradient(
                    180deg,
                    #0b0b0b 0%,
                    #050505 100%
                ) !important;

            border-right: 1px solid rgba(255,255,255,0.07) !important;

            box-shadow:
                10px 0 40px rgba(0,0,0,0.35);
        }


        /* LOGO K */

        aside .bg-white {
            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #991b1b
                ) !important;

            color: white !important;

            box-shadow:
                0 8px 25px rgba(220,38,38,0.30);
        }


        aside h1 {
            color: white !important;
        }


        aside p {
            color: #737373;
        }


        /* JUDUL MENU */

        aside .text-slate-500 {
            color: #ef4444 !important;

            opacity: 0.75;
        }


        /* =====================================================
           MENU SIDEBAR
        ====================================================== */

        aside a {
            transition:
                all 0.25s ease !important;
        }


        /* MENU AKTIF */

        aside a.bg-white {
            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #991b1b
                ) !important;

            color: white !important;

            box-shadow:
                0 8px 24px rgba(220,38,38,0.25);
        }


        aside a.bg-white span {
            background:
                rgba(255,255,255,0.16) !important;

            color: white !important;
        }


        /* MENU BIASA */

        aside a:not(.bg-white) {
            color: #a3a3a3 !important;
        }


        aside a:not(.bg-white):hover {
            background:
                rgba(220,38,38,0.10) !important;

            color: white !important;

            transform:
                translateX(4px);
        }


        aside a:not(.bg-white) span {
            background:
                #111111 !important;

            border:
                1px solid rgba(255,255,255,0.05);
        }


        aside a:not(.bg-white):hover span {
            background:
                rgba(220,38,38,0.15) !important;

            border-color:
                rgba(239,68,68,0.30);
        }


        /* =====================================================
           USER LOGIN SIDEBAR
        ====================================================== */

        aside .bg-slate-900 {
            background:
                #101010 !important;

            border:
                1px solid rgba(255,255,255,0.07);
        }


        aside .bg-slate-900 .bg-white {
            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #991b1b
                ) !important;

            color: white !important;
        }


        /* LOGOUT */

        aside button:hover {
            background:
                rgba(220,38,38,0.12) !important;

            color:
                #f87171 !important;
        }


        /* =====================================================
           MAIN
        ====================================================== */

        main {
            background:
                radial-gradient(
                    circle at 85% 0%,
                    rgba(220,38,38,0.08),
                    transparent 25%
                ),
                #080808 !important;
        }


        /* =====================================================
           TOPBAR
        ====================================================== */

        main header {
            background:
                rgba(10,10,10,0.92) !important;

            border-color:
                rgba(255,255,255,0.08) !important;

            box-shadow:
                0 5px 25px rgba(0,0,0,0.35);
        }


        main header p {
            color: #737373 !important;
        }


        main header h2 {
            color: #ffffff !important;
        }


        main header .text-slate-800 {
            color: #f5f5f5 !important;
        }


        main header .text-slate-400 {
            color: #737373 !important;
        }


        /* PROFILE */

        main header .bg-slate-950 {
            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #991b1b
                ) !important;

            box-shadow:
                0 8px 22px rgba(220,38,38,0.30);
        }


        /* =====================================================
           SEMUA CARD
        ====================================================== */

        main .bg-white {
            background:
                linear-gradient(
                    145deg,
                    #121212,
                    #0b0b0b
                ) !important;

            border-color:
                rgba(255,255,255,0.08) !important;

            box-shadow:
                0 10px 30px rgba(0,0,0,0.30);
        }


        /* =====================================================
           TEKS
        ====================================================== */

        main .text-slate-900 {
            color: #f5f5f5 !important;
        }


        main .text-slate-800 {
            color: #e5e5e5 !important;
        }


        main .text-slate-700 {
            color: #d4d4d4 !important;
        }


        main .text-slate-600 {
            color: #a3a3a3 !important;
        }


        main .text-slate-500 {
            color: #737373 !important;
        }


        main .text-slate-400 {
            color: #666666 !important;
        }


        /* =====================================================
           WELCOME BANNER
        ====================================================== */

        main .bg-slate-950 {
            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(239,68,68,0.25),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #161616,
                    #070707
                ) !important;

            border:
                1px solid rgba(239,68,68,0.15);

            box-shadow:
                0 20px 50px rgba(0,0,0,0.45);
        }


        main .bg-slate-950 h1 {
            color: white !important;
        }


        main .bg-slate-950 p {
            color: #a3a3a3 !important;
        }


        /* =====================================================
           CARD INFORMASI
        ====================================================== */

        main .bg-slate-100 {
            background:
                #181818 !important;

            border:
                1px solid rgba(255,255,255,0.05);
        }


        main .bg-white:hover .bg-slate-100 {
            background:
                rgba(220,38,38,0.12) !important;

            border-color:
                rgba(239,68,68,0.25);
        }


        /* =====================================================
           MENU ADMINISTRASI
        ====================================================== */

        main a.group {
            background:
                linear-gradient(
                    145deg,
                    #121212,
                    #0b0b0b
                ) !important;

            border-color:
                rgba(255,255,255,0.08) !important;

            color: white !important;
        }


        main a.group:hover {
            background:
                linear-gradient(
                    145deg,
                    rgba(220,38,38,0.14),
                    #111111
                ) !important;

            border-color:
                rgba(239,68,68,0.35) !important;

            box-shadow:
                0 15px 35px rgba(0,0,0,0.35);
        }


        main a.group h4 {
            color: white !important;
        }


        main a.group p {
            color: #737373 !important;
        }


        main a.group > div {
            background:
                #191919 !important;
        }


        main a.group:hover > div {
            background:
                rgba(220,38,38,0.14) !important;
        }


        /* =====================================================
           BUTTON MERAH
        ====================================================== */

        main a.bg-slate-950 {
            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #991b1b
                ) !important;

            color:
                white !important;

            box-shadow:
                0 10px 25px rgba(220,38,38,0.25);
        }


        main a.bg-slate-950:hover {
            background:
                linear-gradient(
                    135deg,
                    #f87171,
                    #b91c1c
                ) !important;

            transform:
                translateY(-2px);

            box-shadow:
                0 15px 32px rgba(220,38,38,0.35);
        }


        /* =====================================================
           TABLE
        ====================================================== */

        main table {
            color:
                #e5e5e5 !important;
        }


        main thead {
            background:
                #151515 !important;
        }


        main thead th {
            color:
                #a3a3a3 !important;
        }


        main tbody {
            background:
                #0d0d0d !important;
        }


        main tbody tr {
            border-color:
                rgba(255,255,255,0.06) !important;

            transition:
                background 0.2s ease;
        }


        main tbody tr:hover {
            background:
                rgba(220,38,38,0.06) !important;
        }


        /* =====================================================
           TABEL USER / TARIF
        ====================================================== */

        main tbody .bg-slate-100 {
            background:
                #1a1a1a !important;

            color:
                #d4d4d4 !important;
        }


        /* EDIT */

        main a.bg-slate-100 {
            background:
                #191919 !important;

            color:
                #d4d4d4 !important;

            border:
                1px solid rgba(255,255,255,0.07);
        }


        main a.bg-slate-100:hover {
            background:
                rgba(220,38,38,0.12) !important;

            color:
                #f87171 !important;

            border-color:
                rgba(239,68,68,0.25);
        }


        /* HAPUS */

        main button.bg-red-50 {
            background:
                rgba(239,68,68,0.10) !important;

            color:
                #f87171 !important;
        }


        main button.bg-red-50:hover {
            background:
                rgba(239,68,68,0.18) !important;
        }


        /* =====================================================
           SUCCESS
        ====================================================== */

        main .bg-green-50 {
            background:
                rgba(34,197,94,0.08) !important;

            border-color:
                rgba(34,197,94,0.25) !important;
        }


        main .text-green-700 {
            color:
                #4ade80 !important;
        }


        /* =====================================================
           BADGE ROLE
        ====================================================== */

        main .bg-purple-100 {
            background:
                rgba(168,85,247,0.12) !important;
        }


        main .text-purple-700 {
            color:
                #c084fc !important;
        }


        main .bg-blue-100 {
            background:
                rgba(59,130,246,0.12) !important;
        }


        main .text-blue-700 {
            color:
                #60a5fa !important;
        }


        main .bg-orange-100 {
            background:
                rgba(249,115,22,0.12) !important;
        }


        main .text-orange-700 {
            color:
                #fb923c !important;
        }


        main .bg-green-100 {
            background:
                rgba(34,197,94,0.12) !important;
        }


        /* =====================================================
           BORDER
        ====================================================== */

        main .border-slate-200 {
            border-color:
                rgba(255,255,255,0.08) !important;
        }


        main .border-slate-100 {
            border-color:
                rgba(255,255,255,0.06) !important;
        }


        /* =====================================================
           SCROLLBAR
        ====================================================== */

        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }


        ::-webkit-scrollbar-track {
            background:
                #080808;
        }


        ::-webkit-scrollbar-thumb {
            background:
                linear-gradient(
                    #ef4444,
                    #991b1b
                );

            border-radius:
                10px;
        }


        ::-webkit-scrollbar-thumb:hover {
            background:
                #ef4444;
        }

    </style>

</head>


<body class="bg-slate-100 text-slate-800">


<div class="min-h-screen flex">


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

   <aside
    class="fixed left-0 top-0 z-40 flex h-screen w-72 flex-col bg-slate-950 text-white overflow-y-auto sidebar-scroll">

        {{-- LOGO --}}

        <div
            class="flex h-24 items-center border-b border-slate-800 px-7">

            <div class="flex items-center gap-3">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-white text-xl font-black text-slate-950">

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

      <nav
         class="px-4 py-6 flex-1">

            <p
                class="mb-3 px-3 text-[11px] font-bold uppercase tracking-[0.15em] text-slate-500">

                Menu Utama

            </p>


            {{-- DASHBOARD --}}

            <a
                href="{{ route('admin.dashboard') }}"
                class="mb-2 flex items-center gap-3 rounded-xl
                {{ $menu == 'dashboard'
                    ? 'bg-white text-slate-950 shadow-lg'
                    : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                px-4 py-3.5 text-sm font-semibold transition">

                <span
                    class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100">

                    🏠

                </span>

                Dashboard

            </a>



            {{-- MASTER DATA --}}

            <p
                class="mb-3 mt-8 px-3 text-[11px] font-bold uppercase tracking-[0.15em] text-slate-500">

                Master Data

            </p>


            <div class="space-y-1">


                {{-- USER --}}

                <a
                    href="{{ route('admin.dashboard', ['menu' => 'user']) }}"
                    class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
                    {{ $menu == 'user'
                        ? 'bg-white font-semibold text-slate-950'
                        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                    <span
                        class="flex h-8 w-8 items-center justify-center rounded-lg
                        {{ $menu == 'user'
                            ? 'bg-slate-100'
                            : 'bg-slate-900 group-hover:bg-slate-700' }}">

                        👤

                    </span>

                    <span>
                        User
                    </span>

                </a>



                {{-- TARIF --}}

                <a
                    href="{{ route('admin.dashboard', ['menu' => 'tarif']) }}"
                    class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
                    {{ $menu == 'tarif'
                        ? 'bg-white font-semibold text-slate-950'
                        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                    <span
                        class="flex h-8 w-8 items-center justify-center rounded-lg
                        {{ $menu == 'tarif'
                            ? 'bg-slate-100'
                            : 'bg-slate-900 group-hover:bg-slate-700' }}">

                        💰

                    </span>

                    <span>
                        Tarif Parkir
                    </span>

                </a>



                {{-- AREA --}}

                <a
                    href="{{ route('admin.dashboard', ['menu' => 'area']) }}"
                    class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-300 transition hover:bg-slate-800 hover:text-white">

                    <span
                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-900 group-hover:bg-slate-700">

                        🅿️

                    </span>

                    <span>
                        Area Parkir
                    </span>

                </a>



                {{-- KENDARAAN --}}

                    <a
                        href="{{ route('admin.dashboard', ['menu' => 'kendaraan']) }}"
                        class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
                        {{ $menu == 'kendaraan'
                            ? 'bg-white font-semibold text-slate-950'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                        <span
                            class="flex h-8 w-8 items-center justify-center rounded-lg
                            {{ $menu == 'kendaraan'
                                ? 'bg-slate-100'
                                : 'bg-slate-900 group-hover:bg-slate-700' }}">

                            🚗

                        </span>

                        <span>
                            Kendaraan
                        </span>

                    </a>



            {{-- AKTIVITAS --}}

            <p
                class="mb-3 mt-8 px-3 text-[11px] font-bold uppercase tracking-[0.15em] text-slate-500">

                Aktivitas

            </p>


            <a
                href="#"
                class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-300 transition hover:bg-slate-800 hover:text-white">

                <span
                    class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-900 group-hover:bg-slate-700">

                    📋

                </span>

                <span>
                    Log Aktivitas
                </span>

            </a>

        </nav>



        {{-- USER LOGIN + LOGOUT --}}

        <div
            class="border-t border-slate-800 p-4">


            <div
                class="mb-3 flex items-center gap-3 rounded-xl bg-slate-900 p-3">

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-white font-bold text-slate-950">

                    {{ strtoupper(substr(auth()->user()->nama_lengkap, 0, 1)) }}

                </div>


                <div class="min-w-0">

                    <p
                        class="truncate text-sm font-semibold text-white">

                        {{ auth()->user()->nama_lengkap }}

                    </p>

                    <p
                        class="text-xs capitalize text-slate-400">

                        {{ auth()->user()->role }}

                    </p>

                </div>

            </div>



            {{-- LOGOUT --}}

            <form
                action="{{ route('logout') }}"
                method="POST">

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

        <header
            class="sticky top-0 z-30 flex h-24 items-center justify-between border-b border-slate-200 bg-white/90 px-8 backdrop-blur">


            <div>

                <p
                    class="text-xs font-medium uppercase tracking-wider text-slate-400">

                    KABASA Parking System

                </p>


                <h2
                    class="mt-1 text-xl font-bold text-slate-900">

                    @if($menu == 'user')

                        Data User

                    @elseif($menu == 'tarif')

                        Data Tarif Parkir

                    @elseif($menu == 'area')  

                        Data Area Parkir

                    @elseif($menu == 'kendaraan')

                        Data Kendaraan    

                    @else

                        Dashboard Admin

                    @endif

                </h2>

            </div>



            <div
                class="flex items-center gap-4">

                <div class="text-right">

                    <p
                        class="text-sm font-semibold text-slate-800">

                        {{ auth()->user()->nama_lengkap }}

                    </p>

                    <p
                        class="text-xs capitalize text-slate-400">

                        {{ auth()->user()->role }}

                    </p>

                </div>


                <div
                    class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-950 text-sm font-bold text-white shadow-lg">

                    {{ strtoupper(substr(auth()->user()->nama_lengkap, 0, 1)) }}

                </div>

            </div>

        </header>



        {{-- =====================================================
             CONTENT
        ====================================================== --}}

        <div class="p-8">


            @if($menu == 'user')


                {{-- =================================================
                     DATA USER
                ================================================== --}}

                <div
                    class="mb-8 flex items-center justify-between">


                    <div>

                        <p
                            class="text-sm font-medium text-slate-400">

                            KABASA Parking System

                        </p>


                        <h1
                            class="mt-1 text-3xl font-bold text-slate-900">

                            Data User

                        </h1>


                        <p
                            class="mt-2 text-sm text-slate-500">

                            Kelola data pengguna sistem KABASA.

                        </p>

                    </div>



                    {{-- TAMBAH USER --}}

                    <a
                        href="{{ route('admin.user.create') }}"
                        class="rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-slate-800">

                        + Tambah User

                    </a>

                </div>



                {{-- PESAN SUCCESS --}}

                @if(session('success'))

                    <div
                        class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">

                        ✓ {{ session('success') }}

                    </div>

                @endif



                {{-- TABEL USER --}}

                <div
                    class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


                    <div
                        class="border-b border-slate-200 px-6 py-5">

                        <h2
                            class="text-lg font-bold text-slate-900">

                            Daftar Pengguna

                        </h2>

                        <p
                            class="mt-1 text-sm text-slate-400">

                            Data admin, petugas, dan owner.

                        </p>

                    </div>



                    <div class="overflow-x-auto">

                        <table
                            class="w-full text-left text-sm">

                            <thead
                                class="bg-slate-50">

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



                            <tbody
                                class="divide-y divide-slate-100">


                                @forelse($users as $user)


                                    <tr
                                        class="transition hover:bg-slate-50">


                                        <td
                                            class="px-6 py-4 text-slate-400">

                                            {{ $loop->iteration }}

                                        </td>



                                        <td
                                            class="px-6 py-4">

                                            <span
                                                class="rounded-lg bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">

                                                {{ $user->id_user }}

                                            </span>

                                        </td>



                                        <td
                                            class="px-6 py-4">

                                            <div
                                                class="flex items-center gap-3">


                                                <div
                                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-900 text-xs font-bold text-white">

                                                    {{ strtoupper(substr($user->nama_lengkap, 0, 1)) }}

                                                </div>


                                                <span
                                                    class="font-semibold text-slate-800">

                                                    {{ $user->nama_lengkap }}

                                                </span>

                                            </div>

                                        </td>



                                        <td
                                            class="px-6 py-4 text-slate-600">

                                            {{ $user->username }}

                                        </td>



                                        <td class="px-6 py-4">


                                            @if($user->role == 'admin')

                                                <span
                                                    class="rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700">

                                                    Admin

                                                </span>

                                            @elseif($user->role == 'petugas')

                                                <span
                                                    class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                                                    Petugas

                                                </span>

                                            @else

                                                <span
                                                    class="rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">

                                                    Owner

                                                </span>

                                            @endif

                                        </td>



                                        <td class="px-6 py-4">


                                            @if($user->status_aktif == 1)

                                                <span
                                                    class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                                    Aktif

                                                </span>

                                            @else

                                                <span
                                                    class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                                    Tidak Aktif

                                                </span>

                                            @endif

                                        </td>



                                        <td class="px-6 py-4">


                                            <div
                                                class="flex justify-center gap-2">


                                                {{-- EDIT --}}

                                                <a
                                                    href="{{ route('admin.user.edit', $user->id_user) }}"
                                                    class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-200">

                                                    Edit

                                                </a>



                                                {{-- HAPUS --}}

                                                <form
                                                    action="{{ route('admin.user.destroy', $user->id_user) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                                    @csrf

                                                    @method('DELETE')


                                                    <button
                                                        type="submit"
                                                        class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">

                                                        Hapus

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>


                                @empty


                                    <tr>

                                        <td
                                            colspan="7"
                                            class="px-6 py-12 text-center">

                                            <div class="text-4xl">
                                                👤
                                            </div>

                                            <p
                                                class="mt-3 font-semibold text-slate-700">

                                                Belum ada data user

                                            </p>

                                            <p
                                                class="mt-1 text-sm text-slate-400">

                                                Silakan tambahkan user baru.

                                            </p>

                                        </td>

                                    </tr>


                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>



                        @elseif($menu == 'tarif')


                            {{-- =================================================
                                DATA TARIF PARKIR
                            ================================================== --}}

                            <div
                                class="mb-8 flex items-center justify-between">


                                <div>

                                    <p
                                        class="text-sm font-medium text-slate-400">

                                        KABASA Parking System

                                    </p>


                                    <h1
                                        class="mt-1 text-3xl font-bold text-slate-900">

                                        Data Tarif Parkir

                                    </h1>


                                    <p
                                        class="mt-2 text-sm text-slate-500">

                                        Kelola tarif parkir berdasarkan jenis kendaraan.

                                    </p>

                                </div>



                                {{-- TAMBAH TARIF --}}

                                <a
                                    href="{{ route('admin.tarif.create') }}"
                                    class="rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-slate-800">

                                    + Tambah Tarif

                                </a>

                            </div>



                            {{-- PESAN SUCCESS --}}

                            @if(session('success'))

                                <div
                                    class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">

                                    ✓ {{ session('success') }}

                                </div>

                            @endif



                            {{-- TABEL TARIF --}}

                            <div
                                class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


                                <div
                                    class="border-b border-slate-200 px-6 py-5">

                                    <h2
                                        class="text-lg font-bold text-slate-900">

                                        Daftar Tarif Parkir

                                    </h2>

                                    <p
                                        class="mt-1 text-sm text-slate-400">

                                        Data tarif kendaraan yang digunakan dalam sistem.

                                    </p>

                                </div>



                                <div class="overflow-x-auto">

                                    <table
                                        class="w-full text-left text-sm">


                                        <thead
                                            class="bg-slate-50">

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



                                        <tbody
                                            class="divide-y divide-slate-100">


                                            @forelse($tarifs as $tarif)


                                                <tr
                                                    class="transition hover:bg-slate-50">


                                                    <td
                                                        class="px-6 py-4 text-slate-400">

                                                        {{ $loop->iteration }}

                                                    </td>



                                                    <td
                                                        class="px-6 py-4">

                                                        <span
                                                            class="rounded-lg bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">

                                                            {{ $tarif->id_tarif }}

                                                        </span>

                                                    </td>



                                                    <td
                                                        class="px-6 py-4 font-semibold text-slate-800">

                                                        {{ $tarif->jenis_kendaraan }}

                                                    </td>



                                                    <td
                                                        class="px-6 py-4 font-semibold text-slate-800">

                                                        Rp
                                                        {{ number_format($tarif->tarif_per_jam, 0, ',', '.') }}

                                                    </td>



                                                    <td
                                                        class="px-6 py-4">


                                                        <div
                                                            class="flex justify-center gap-2">


                                                            {{-- EDIT --}}

                                                            <a
                                                                href="{{ route('admin.tarif.edit', $tarif->id_tarif) }}"
                                                                class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-200">

                                                                Edit

                                                            </a>



                                                            {{-- HAPUS --}}

                                                            <form
                                                                action="{{ route('admin.tarif.destroy', $tarif->id_tarif) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Yakin ingin menghapus tarif ini?')">

                                                                @csrf

                                                                @method('DELETE')


                                                                <button
                                                                    type="submit"
                                                                    class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">

                                                                    Hapus

                                                                </button>

                                                            </form>

                                                        </div>

                                                    </td>

                                                </tr>


                                            @empty


                                                <tr>

                                                    <td
                                                        colspan="5"
                                                        class="px-6 py-12 text-center">

                                                        <div class="text-4xl">
                                                            💰
                                                        </div>


                                                        <p
                                                            class="mt-3 font-semibold text-slate-700">

                                                            Belum ada data tarif

                                                        </p>


                                                        <p
                                                            class="mt-1 text-sm text-slate-400">

                                                            Silakan tambahkan tarif parkir baru.

                                                        </p>

                                                    </td>

                                                </tr>


                                            @endforelse

                                        </tbody>

                                    </table>


                                </div>

                            </div>

                               @elseif($menu == 'area')

                {{-- =================================================
                    DATA AREA PARKIR
                ================================================== --}}

                <div
                    class="mb-8 flex items-center justify-between">


                    <div>

                        <p
                            class="text-sm font-medium text-slate-400">

                            KABASA Parking System

                        </p>


                        <h1
                            class="mt-1 text-3xl font-bold text-slate-900">

                            Data Area Parkir

                        </h1>


                        <p
                            class="mt-2 text-sm text-slate-500">

                            Kelola area parkir berdasarkan kapasitas dan kondisi area.

                        </p>

                    </div>



                    {{-- TAMBAH AREA --}}

                    <a
                        href="{{ route('admin.area.create') }}"
                        class="rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-slate-800">

                        + Tambah Area

                    </a>

                </div>



                {{-- NOTIFIKASI --}}

                @if(session('success'))

                    <div
                        class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">

                        ✓ {{ session('success') }}

                    </div>

                @endif
              {{-- TABEL AREA PARKIR --}}

                    <div
                        class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


                        <div
                            class="border-b border-slate-200 px-6 py-5">

                            <h2
                                class="text-lg font-bold text-slate-900">

                                Daftar Area Parkir

                            </h2>

                            <p
                                class="mt-1 text-sm text-slate-400">

                                Data area parkir yang digunakan dalam sistem.

                            </p>

                        </div>



                        <div class="overflow-x-auto">

                            <table
                                class="w-full text-left text-sm">


                                <thead
                                    class="bg-slate-50">

                                    <tr>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            No
                                        </th>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            ID Area
                                        </th>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            Nama Area
                                        </th>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            Kapasitas
                                        </th>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            Terisi
                                        </th>

                                        <th class="px-6 py-4 text-center font-semibold text-slate-500">
                                            Aksi
                                        </th>

                                    </tr>

                                </thead>



                                <tbody
                                    class="divide-y divide-slate-100">


                                    @forelse($areas as $area)


                                        <tr
                                            class="transition hover:bg-slate-50">


                                            <td
                                                class="px-6 py-4 text-slate-400">

                                                {{ $loop->iteration }}

                                            </td>



                                            <td
                                                class="px-6 py-4">

                                                <span
                                                    class="rounded-lg bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">

                                                    {{ $area->id_area }}

                                                </span>

                                            </td>



                                            <td
                                                class="px-6 py-4 font-semibold text-slate-800">

                                                {{ $area->nama_area }}

                                            </td>



                                            <td
                                                class="px-6 py-4 font-semibold text-slate-800">

                                                {{ $area->kapasitas }}

                                            </td>



                                            <td
                                                class="px-6 py-4 font-semibold text-slate-800">

                                                {{ $area->terisi }}

                                            </td>



                                            <td
                                                class="px-6 py-4">


                                                <div
                                                    class="flex justify-center gap-2">


                                                    {{-- EDIT --}}

                                                    <a
                                                        href="{{ route('admin.area.edit', $area->id_area) }}"
                                                        class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-200">

                                                        Edit

                                                    </a>



                                                    {{-- HAPUS --}}

                                                   <form
                                                        action="{{ route('admin.area.destroy', $area->id_area) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus area parkir ini?')">

                                                        @csrf

                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">

                                                            Hapus

                                                        </button>

                                                    </form>
                                                </div>

                                            </td>

                                        </tr>


                                    @empty


                                        <tr>

                                            <td
                                                colspan="6"
                                                class="px-6 py-12 text-center">

                                                <div class="text-4xl">
                                                    🅿️
                                                </div>


                                                <p
                                                    class="mt-3 font-semibold text-slate-700">

                                                    Belum ada data area parkir

                                                </p>


                                                <p
                                                    class="mt-1 text-sm text-slate-400">

                                                    Silakan tambahkan area parkir baru.

                                                </p>

                                            </td>

                                        </tr>


                                    @endforelse

                                </tbody>

                            </table>


                        </div>

                    </div>

                                    @elseif($menu == 'kendaraan')

                    {{-- =================================================
                        DATA KENDARAAN
                    ================================================== --}}

                    <div class="mb-8 flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-slate-400">
                                KABASA Parking System
                            </p>

                            <h1 class="mt-1 text-3xl font-bold text-slate-900">
                                Data Kendaraan
                            </h1>

                            <p class="mt-2 text-sm text-slate-500">
                                Kelola data kendaraan yang terdaftar dalam sistem parkir.
                            </p>

                        </div>


                        {{-- TAMBAH KENDARAAN --}}

                        <a
                            href="{{ route('admin.kendaraan.create') }}"
                            class="rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-slate-800">

                            + Tambah Kendaraan

                        </a>

                    </div>


                    {{-- NOTIFIKASI --}}

                    @if(session('success'))

                        <div
                            class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">

                            ✓ {{ session('success') }}

                        </div>

                    @endif


                    {{-- TABEL KENDARAAN --}}

                    <div
                        class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div
                            class="border-b border-slate-200 px-6 py-5">

                            <h2 class="text-lg font-bold text-slate-900">
                                Daftar Kendaraan
                            </h2>

                            <p class="mt-1 text-sm text-slate-400">
                                Data kendaraan yang terdaftar dalam sistem KABASA.
                            </p>

                        </div>


                        <div class="overflow-x-auto">

                            <table class="w-full text-left text-sm">

                                <thead class="bg-slate-50">

                                    <tr>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            No
                                        </th>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            ID Kendaraan
                                        </th>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            Jenis Kendaraan
                                        </th>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            Warna
                                        </th>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            Pemilik
                                        </th>

                                        <th class="px-6 py-4 font-semibold text-slate-500">
                                            ID User
                                        </th>

                                        <th class="px-6 py-4 text-center font-semibold text-slate-500">
                                            Aksi
                                        </th>

                                    </tr>

                                </thead>


                                <tbody class="divide-y divide-slate-100">

                                    @forelse($kendaraans as $kendaraan)

                                        <tr class="transition hover:bg-slate-50">

                                            <td class="px-6 py-4 text-slate-400">
                                                {{ $loop->iteration }}
                                            </td>


                                            <td class="px-6 py-4">

                                                <span
                                                    class="rounded-lg bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">

                                                    {{ $kendaraan->id_kendaraan }}

                                                </span>

                                            </td>


                                            <td class="px-6 py-4 font-semibold text-slate-800">

                                                {{ $kendaraan->jenis_kendaraan }}

                                            </td>


                                            <td class="px-6 py-4 text-slate-600">

                                                {{ $kendaraan->warna }}

                                            </td>


                                            <td class="px-6 py-4 font-semibold text-slate-800">

                                                {{ $kendaraan->pemilik }}

                                            </td>


                                            <td class="px-6 py-4 text-slate-600">

                                                {{ $kendaraan->id_user }}

                                            </td>


                                            <td class="px-6 py-4">

                                                <div class="flex justify-center gap-2">


                                                    {{-- EDIT --}}

                                                    <a
                                                        href="{{ route('admin.kendaraan.edit', $kendaraan->id_kendaraan) }}"
                                                        class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-200">

                                                        Edit

                                                    </a>


                                                    {{-- HAPUS --}}

                                                    <form
                                                        action="{{ route('admin.kendaraan.destroy', $kendaraan->id_kendaraan) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus kendaraan ini?')">

                                                        @csrf

                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">

                                                            Hapus

                                                        </button>

                                                    </form>

                                                </div>

                                            </td>

                                        </tr>


                                    @empty

                                        <tr>

                                            <td
                                                colspan="7"
                                                class="px-6 py-12 text-center">

                                                <div class="text-4xl">
                                                    🚗
                                                </div>

                                                <p
                                                    class="mt-3 font-semibold text-slate-700">

                                                    Belum ada data kendaraan

                                                </p>

                                                <p
                                                    class="mt-1 text-sm text-slate-400">

                                                    Silakan tambahkan kendaraan baru.

                                                </p>

                                            </td>

                                        </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>
            @else


                {{-- =================================================
                     DASHBOARD UTAMA
                ================================================== --}}

                <div
                    class="relative mb-8 overflow-hidden rounded-2xl bg-slate-950 p-8 text-white shadow-xl">


                    <div
                        class="relative z-10">


                        <p
                            class="mb-2 text-sm font-medium text-slate-400">

                            Selamat datang kembali 👋

                        </p>


                        <h1
                            class="text-3xl font-bold">

                            Halo, {{ auth()->user()->nama_lengkap }}!

                        </h1>


                        <p
                            class="mt-3 max-w-xl text-sm leading-6 text-slate-400">

                            Kelola data dan aktivitas sistem parkir
                            KABASA melalui dashboard admin.

                        </p>

                    </div>



                    {{-- DECORATION --}}

                    <div
                        class="absolute -right-10 -top-20 h-64 w-64 rounded-full bg-white/5">
                    </div>


                    <div
                        class="absolute -bottom-32 right-40 h-72 w-72 rounded-full bg-white/5">
                    </div>


                    <div
                        class="absolute right-20 top-10 h-2 w-2 rounded-full bg-red-500 shadow-[0_0_20px_#ef4444]">
                    </div>

                </div>



                {{-- =================================================
                     INFORMASI SISTEM
                ================================================== --}}

                <div class="mb-8">


                    <div class="mb-5">

                        <h3
                            class="text-lg font-bold text-slate-900">

                            Informasi Sistem

                        </h3>


                        <p
                            class="mt-1 text-sm text-slate-500">

                            Ringkasan data yang dikelola oleh admin.

                        </p>

                    </div>



                    <div
                        class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">


                        {{-- USER --}}

                        <div
                            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">


                            <div
                                class="flex items-start justify-between">


                                <div>

                                    <p
                                        class="text-sm text-slate-500">

                                        Total User

                                    </p>


                                    <h3
                                        class="mt-3 text-3xl font-bold text-slate-900">

                                         {{ $jumlahUser }}

                                    </h3>


                                    <p
                                        class="mt-2 text-xs text-slate-400">

                                        User terdaftar

                                    </p>

                                </div>


                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                                    👤

                                </div>

                            </div>

                        </div>



                        {{-- TARIF --}}

                        <div
                            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">


                            <div
                                class="flex items-start justify-between">


                                <div>

                                    <p
                                        class="text-sm text-slate-500">

                                        Tarif Parkir

                                    </p>


                                    <h3
                                        class="mt-3 text-3xl font-bold text-slate-900">

                                        {{ $jumlahTarif}}

                                    </h3>


                                    <p
                                        class="mt-2 text-xs text-slate-400">

                                        Tarif tersedia

                                    </p>

                                </div>


                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                                    💰

                                </div>

                            </div>

                        </div>



                        {{-- AREA --}}

                        <div
                            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">


                            <div
                                class="flex items-start justify-between">


                                <div>

                                    <p
                                        class="text-sm text-slate-500">

                                        Area Parkir

                                    </p>


                                    <h3
                                        class="mt-3 text-3xl font-bold text-slate-900">

                                        {{ $jumlahArea}}

                                    </h3>


                                    <p
                                        class="mt-2 text-xs text-slate-400">

                                        Area terdaftar

                                    </p>

                                </div>


                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                                    🅿️

                                </div>

                            </div>

                        </div>



                        {{-- KENDARAAN --}}

                        <div
                            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">


                            <div
                                class="flex items-start justify-between">


                                <div>

                                    <p
                                        class="text-sm text-slate-500">

                                        Kendaraan

                                    </p>


                                    <h3
                                        class="mt-3 text-3xl font-bold text-slate-900">

                                        {{ $jumlahKendaraan}}

                                    </h3>


                                    <p
                                        class="mt-2 text-xs text-slate-400">

                                        Kendaraan terdaftar

                                    </p>

                                </div>


                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                                    🚗

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     MENU ADMINISTRASI
                ================================================== --}}

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">


                    <h3
                        class="text-lg font-bold text-slate-900">

                        Menu Administrasi

                    </h3>


                    <p
                        class="mt-1 text-sm text-slate-500">

                        Kelola data utama sistem parkir KABASA.

                    </p>



                    <div
                        class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">


                        {{-- USER --}}

                        <a
                            href="{{ route('admin.dashboard', ['menu' => 'user']) }}"
                            class="group rounded-xl border border-slate-200 p-5 transition hover:-translate-y-1 hover:bg-slate-50 hover:shadow-md">


                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                                👤

                            </div>


                            <h4
                                class="mt-4 font-bold text-slate-900">

                                Kelola User

                            </h4>


                            <p
                                class="mt-1 text-xs leading-5 text-slate-400">

                                Tambah, edit, dan hapus data user.

                            </p>

                        </a>



                        {{-- TARIF --}}

                        <a
                            href="{{ route('admin.dashboard', ['menu' => 'tarif']) }}"
                            class="group rounded-xl border border-slate-200 p-5 transition hover:-translate-y-1 hover:bg-slate-50 hover:shadow-md">


                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                                💰

                            </div>


                            <h4
                                class="mt-4 font-bold text-slate-900">

                                Kelola Tarif

                            </h4>


                            <p
                                class="mt-1 text-xs leading-5 text-slate-400">

                                Atur tarif parkir kendaraan.

                            </p>

                        </a>



                 {{-- AREA --}}

                    <a
                        href="{{ route('admin.dashboard', ['menu' => 'area']) }}"
                        class="group rounded-xl border border-slate-200 p-5 transition hover:-translate-y-1 hover:bg-slate-50 hover:shadow-md">


                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                            🅿️

                        </div>


                        <h4
                            class="mt-4 font-bold text-slate-900">

                            Kelola Area Parkir

                        </h4>


                        <p
                            class="mt-1 text-xs leading-5 text-slate-400">

                            Kelola data area parkir.

                        </p>

                    </a>


                        {{-- KENDARAAN --}}

                        <a
                            href="#"
                            class="group rounded-xl border border-slate-200 p-5 transition hover:-translate-y-1 hover:bg-slate-50 hover:shadow-md">


                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-2xl">

                                🚗

                            </div>


                            <h4
                                class="mt-4 font-bold text-slate-900">

                                Kelola Kendaraan

                            </h4>


                            <p
                                class="mt-1 text-xs leading-5 text-slate-400">

                                Kelola data kendaraan.

                            </p>

                        </a>

                    </div>

                </div>



                {{-- =================================================
                     LOG AKTIVITAS
                ================================================== --}}

                <div
                    class="mt-6 rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">


                    <h3
                        class="text-lg font-bold text-slate-900">

                        Log Aktivitas

                    </h3>


                    <p
                        class="mt-1 text-sm text-slate-500">

                        Pantau aktivitas sistem.

                    </p>



                    <div
                        class="mt-6 border-t border-slate-100 pt-5">


                        <div
                            class="flex items-center gap-4">


                            <div
                                class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-100">

                                📋

                            </div>


                            <div>

                                <p
                                    class="text-sm font-semibold text-slate-900">

                                    Sistem siap digunakan

                                </p>


                                <p
                                    class="mt-1 text-xs text-slate-400">

                                    Aktivitas admin akan ditampilkan di sini.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>


            @endif



            {{-- FOOTER --}}

            <footer
                class="py-8 text-center">

                <p
                    class="text-xs text-slate-400">

                    © {{ date('Y') }} KABASA Parking System

                </p>

            </footer>


        </div>

    </main>

</div>

</body>

</html>