<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Tarif - KABASA</title>

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
            border: 1px solid #292929;
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
            border-color: #3f3f3f;
        }
    </style>
</head>

<body class="min-h-screen text-white">

<div class="min-h-screen px-5 py-8">

    <div class="mx-auto max-w-2xl">

        {{-- HEADER --}}
        <div class="mb-8">

            <a
                href="{{ route('admin.dashboard', ['menu' => 'tarif']) }}"
                class="text-sm font-semibold text-slate-500 transition hover:text-red-400"
            >
                ← Kembali ke Tarif Parkir
            </a>

            <div class="mt-6 flex items-center gap-3">

                <div class="h-10 w-1 rounded-full bg-red-500"></div>

                <div>

                    <p class="text-xs font-bold uppercase tracking-[0.3em] text-red-500">
                        KABASA ADMIN
                    </p>

                    <h1 class="mt-1 text-3xl font-black text-white">
                        Edit Tarif
                    </h1>

                </div>

            </div>

            <p class="mt-3 text-sm text-slate-500">
                Ubah data tarif parkir yang sudah terdaftar.
            </p>

        </div>


        {{-- ERROR --}}
        @if($errors->any())

            <div class="mb-6 rounded-2xl border border-red-900/50 bg-red-950/30 p-5">

                <p class="font-bold text-red-400">
                    ⚠ Ada kesalahan
                </p>

                <ul class="mt-2 list-disc pl-5 text-sm text-red-300">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORM --}}
        <form
            action="{{ route('admin.tarif.update', $tarif->id_tarif) }}"
            method="POST"
            class="rounded-3xl border border-white/10 bg-[#0b0b0b] p-7 shadow-2xl md:p-9"
        >

            @csrf
            @method('PUT')


            <div class="mb-7 border-b border-white/10 pb-5">

                <p class="text-sm font-bold text-white">
                    Informasi Tarif
                </p>

                <p class="mt-1 text-xs text-slate-500">
                    Perbarui tarif sesuai kebutuhan.
                </p>

            </div>


            {{-- ID TARIF --}}
            <div class="mb-5">

                <label class="mb-2 block text-sm font-semibold text-slate-300">
                    ID Tarif
                </label>

                <input
                    type="text"
                    value="{{ $tarif->id_tarif }}"
                    disabled
                    class="input-disabled w-full rounded-xl px-4 py-3 text-sm"
                >

                <p class="mt-2 text-xs text-slate-600">
                    ID Tarif tidak dapat diubah.
                </p>

            </div>


            {{-- JENIS KENDARAAN --}}
            <div class="mb-5">

                <label class="mb-2 block text-sm font-semibold text-slate-300">
                    Jenis Kendaraan
                </label>

                <select
                    name="jenis_kendaraan"
                    required
                    class="input-dark w-full rounded-xl px-4 py-3 text-sm"
                >

                    <option value="Motor"
                        {{ old('jenis_kendaraan', $tarif->jenis_kendaraan) == 'Motor' ? 'selected' : '' }}>
                        Motor
                    </option>

                    <option value="Mobil"
                        {{ old('jenis_kendaraan', $tarif->jenis_kendaraan) == 'Mobil' ? 'selected' : '' }}>
                        Mobil
                    </option>

                    <option value="Truk"
                        {{ old('jenis_kendaraan', $tarif->jenis_kendaraan) == 'Truk' ? 'selected' : '' }}>
                        Truk
                    </option>

                </select>

                @error('jenis_kendaraan')
                    <p class="mt-2 text-sm text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- TARIF PER JAM --}}
            <div class="mb-8">

                <label class="mb-2 block text-sm font-semibold text-slate-300">
                    Tarif Per Jam
                </label>

                <div class="relative">

                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-bold text-red-500">
                        Rp
                    </span>

                    <input
                        type="number"
                        name="tarif_per_jam"
                        value="{{ old('tarif_per_jam', $tarif->tarif_per_jam) }}"
                        min="0"
                        required
                        class="input-dark w-full rounded-xl py-3 pl-12 pr-4 text-sm"
                    >

                </div>

                @error('tarif_per_jam')
                    <p class="mt-2 text-sm text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- BUTTON --}}
            <div class="flex items-center justify-between">

                <a
                    href="{{ route('admin.dashboard', ['menu' => 'tarif']) }}"
                    class="btn-dark rounded-xl px-5 py-3 text-sm font-bold text-slate-300"
                >
                    ← Batal
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