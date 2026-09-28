<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit User - KABASA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background:
                radial-gradient(circle at top left, rgba(239, 68, 68, 0.10), transparent 30%),
                radial-gradient(circle at bottom right, rgba(127, 29, 29, 0.08), transparent 30%),
                #050505;
        }

        .input-dark {
            background: #111111;
            border: 1px solid #272727;
            color: white;
            transition: .25s ease;
        }

        .input-dark:focus {
            border-color: #ef4444;
            outline: none;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, .10);
        }

        .input-disabled {
            background: #181818;
            border: 1px solid #252525;
            color: #777;
        }

        select.input-dark option {
            background: #111111;
            color: white;
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
            background: #171717;
            border: 1px solid #2a2a2a;
            transition: .25s ease;
        }

        .btn-dark:hover {
            background: #222;
        }
    </style>
</head>

<body class="min-h-screen text-white">

<div class="min-h-screen px-5 py-8">

    <div class="mx-auto max-w-3xl">

        {{-- HEADER --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.dashboard', ['menu' => 'user']) }}"
                class="text-sm font-semibold text-slate-500 transition hover:text-red-400"
            >
                ← Kembali ke Data User
            </a>

            <div class="mt-6 flex items-center gap-3">

                <div class="h-10 w-1 rounded-full bg-red-500"></div>

                <div>

                    <p class="text-xs font-bold uppercase tracking-[0.3em] text-red-500">
                        KABASA ADMIN
                    </p>

                    <h1 class="mt-1 text-3xl font-black text-white">
                        Edit User
                    </h1>

                </div>

            </div>

            <p class="mt-3 text-sm text-slate-500">
                Ubah data pengguna yang sudah terdaftar.
            </p>

        </div>


        {{-- FORM --}}
        <form
            action="{{ route('admin.user.update', $user->id_user) }}"
            method="POST"
            class="rounded-3xl border border-white/10 bg-[#0b0b0b] p-7 shadow-2xl md:p-9"
        >

            @csrf
            @method('PUT')


            <div class="mb-7 border-b border-white/10 pb-5">

                <p class="text-sm font-bold text-white">
                    Informasi Pengguna
                </p>

                <p class="mt-1 text-xs text-slate-500">
                    Perbarui data pengguna sesuai kebutuhan.
                </p>

            </div>


            {{-- ID USER --}}
            <div class="mb-5">

                <label class="mb-2 block text-sm font-semibold text-slate-300">
                    ID User
                </label>

                <input
                    type="text"
                    value="{{ $user->id_user }}"
                    disabled
                    class="input-disabled w-full rounded-xl px-4 py-3 text-sm"
                >

                <p class="mt-2 text-xs text-slate-600">
                    ID User tidak dapat diubah.
                </p>

            </div>


            {{-- NAMA --}}
            <div class="mb-5">

                <label class="mb-2 block text-sm font-semibold text-slate-300">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    name="nama_lengkap"
                    value="{{ old('nama_lengkap', $user->nama_lengkap) }}"
                    required
                    class="input-dark w-full rounded-xl px-4 py-3 text-sm"
                >

            </div>


            {{-- USERNAME --}}
            <div class="mb-5">

                <label class="mb-2 block text-sm font-semibold text-slate-300">
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    value="{{ old('username', $user->username) }}"
                    required
                    class="input-dark w-full rounded-xl px-4 py-3 text-sm"
                >

            </div>


            {{-- PASSWORD --}}
            <div class="mb-5">

                <label class="mb-2 block text-sm font-semibold text-slate-300">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Kosongkan jika tidak ingin mengubah password"
                    class="input-dark w-full rounded-xl px-4 py-3 text-sm"
                >

                <p class="mt-2 text-xs text-slate-600">
                    Isi hanya jika ingin mengganti password.
                </p>

            </div>


            {{-- ROLE --}}
            <div class="mb-5">

                <label class="mb-2 block text-sm font-semibold text-slate-300">
                    Role
                </label>

                <select
                    name="role"
                    required
                    class="input-dark w-full rounded-xl px-4 py-3 text-sm"
                >

                    <option value="admin"
                        {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="petugas"
                        {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>
                        Petugas
                    </option>

                    <option value="owner"
                        {{ old('role', $user->role) == 'owner' ? 'selected' : '' }}>
                        Owner
                    </option>

                </select>

            </div>


            {{-- STATUS --}}
            <div class="mb-8">

                <label class="mb-2 block text-sm font-semibold text-slate-300">
                    Status Aktif
                </label>

                <select
                    name="status_aktif"
                    required
                    class="input-dark w-full rounded-xl px-4 py-3 text-sm"
                >

                    <option value="1"
                        {{ old('status_aktif', $user->status_aktif) == 1 ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="0"
                        {{ old('status_aktif', $user->status_aktif) == 0 ? 'selected' : '' }}>
                        Tidak Aktif
                    </option>

                </select>

            </div>


            {{-- BUTTON --}}
            <div class="flex justify-end gap-3">

                <a
                    href="{{ route('admin.dashboard', ['menu' => 'user']) }}"
                    class="btn-dark rounded-xl px-5 py-3 text-sm font-bold text-slate-300"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn-red rounded-xl px-6 py-3 text-sm font-bold text-white"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>