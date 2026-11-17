
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kendaraan - KABASA</title>

    <script src="https://cdn.tailwindcss.com"></script>

    {{-- FONT POPPINS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body
    class="min-h-screen bg-black text-white"
    style="font-family: 'Poppins', sans-serif;">

    <div class="min-h-screen px-6 py-10">

        <div class="mx-auto max-w-3xl">

            {{-- KEMBALI --}}
            <a
                href="{{ route('admin.dashboard', ['menu' => 'kendaraan']) }}"
                class="text-sm font-medium text-slate-400 transition hover:text-red-500">
                ← Kembali ke Kendaraan
            </a>

            {{-- HEADER --}}
            <div class="mt-5">

                <div class="border-l-4 border-red-500 pl-3">

                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-red-500">
                        KABASA ADMIN
                    </p>

                    <h1 class="text-3xl font-bold text-white">
                        Tambah Kendaraan
                    </h1>

                </div>

                <p class="mt-2 text-sm text-slate-500">
                    Tambahkan data kendaraan yang terdaftar dalam sistem parkir.
                </p>

            </div>

            {{-- CARD FORM --}}
            <div class="mt-6 rounded-2xl border border-slate-800 bg-[#0a0a0a] p-7 shadow-xl">

                {{-- JUDUL CARD --}}
                <div class="border-b border-slate-800 pb-5">

                    <h2 class="text-sm font-bold text-white">
                        Informasi Kendaraan
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        Masukkan data kendaraan dengan benar.
                    </p>

                </div>

                {{-- FORM --}}
                <form
                    action="{{ route('admin.kendaraan.store') }}"
                    method="POST"
                    class="mt-6">

                    @csrf

                    {{-- ID KENDARAAN --}}
                    <div class="mb-5">

                        <label class="mb-2 block text-sm font-semibold text-slate-300">
                            ID Kendaraan
                        </label>

                        <input
                            type="text"
                            name="id_kendaraan"
                            value="{{ old('id_kendaraan') }}"
                            maxlength="10"
                            placeholder="Contoh: K001"
                            class="w-full rounded-lg border border-slate-800 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-red-500 focus:ring-1 focus:ring-red-500">

                        @error('id_kendaraan')
                            <p class="mt-2 text-xs text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- PLAT NOMOR --}}
                    <div class="mb-5">

                        <label class="mb-2 block text-sm font-semibold text-slate-300">
                            Plat Nomor
                        </label>

                        <p class="mb-2 text-xs text-slate-500">
                            Wajib untuk Motor, Mobil, dan Truk. Boleh dikosongkan untuk Sepeda Pancal, Becak, Dokar, dan Lainnya.
                        </p>

                        <input
                            type="text"
                            name="plat_nomor"
                            value="{{ old('plat_nomor') }}"
                            maxlength="20"
                            placeholder="Contoh: AE 1234 AB"
                            class="w-full rounded-lg border border-slate-800 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-red-500 focus:ring-1 focus:ring-red-500">

                        @error('plat_nomor')
                            <p class="mt-2 text-xs text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- JENIS KENDARAAN --}}
                    <div class="mb-5">

                        <label class="mb-2 block text-sm font-semibold text-slate-300">
                            Jenis Kendaraan
                        </label>

                        <select
                            name="jenis_kendaraan"
                            id="jenis_kendaraan"
                            required
                            class="w-full rounded-lg border border-slate-800 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-red-500 focus:ring-1 focus:ring-red-500">

                            <option value="">-- Pilih Jenis Kendaraan --</option>

                            <option value="Motor" {{ old('jenis_kendaraan') == 'Motor' ? 'selected' : '' }}>
                                Motor
                            </option>

                            <option value="Mobil" {{ old('jenis_kendaraan') == 'Mobil' ? 'selected' : '' }}>
                                Mobil
                            </option>

                            <option value="Truk" {{ old('jenis_kendaraan') == 'Truk' ? 'selected' : '' }}>
                                Truk
                            </option>

                            <option value="Sepeda Pancal" {{ old('jenis_kendaraan') == 'Sepeda Pancal' ? 'selected' : '' }}>
                                Sepeda Pancal
                            </option>

                            <option value="Becak" {{ old('jenis_kendaraan') == 'Becak' ? 'selected' : '' }}>
                                Becak
                            </option>

                            <option value="Dokar" {{ old('jenis_kendaraan') == 'Dokar' ? 'selected' : '' }}>
                                Dokar
                            </option>

                            <option value="Lainnya" {{ old('jenis_kendaraan') == 'Lainnya' ? 'selected' : '' }}>
                                Lainnya
                            </option>

                        </select>

                        @error('jenis_kendaraan')
                            <p class="mt-2 text-xs text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- WARNA KENDARAAN --}}
                    <div class="mb-5">

                        <label class="mb-2 block text-sm font-semibold text-slate-300">
                            Warna Kendaraan
                        </label>

                        <input
                            type="text"
                            name="warna"
                            value="{{ old('warna') }}"
                            maxlength="20"
                            placeholder="Contoh: Hitam"
                            class="w-full rounded-lg border border-slate-800 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-red-500 focus:ring-1 focus:ring-red-500">

                        @error('warna')
                            <p class="mt-2 text-xs text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- PEMILIK --}}
                    <div class="mb-6">

                        <label class="mb-2 block text-sm font-semibold text-slate-300">
                            Pemilik
                        </label>

                        <input
                            type="text"
                            name="pemilik"
                            value="{{ old('pemilik') }}"
                            maxlength="100"
                            placeholder="Contoh: Ahmad"
                            class="w-full rounded-lg border border-slate-800 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-red-500 focus:ring-1 focus:ring-red-500">

                        @error('pemilik')
                            <p class="mt-2 text-xs text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- BUTTON --}}
                    <div class="flex items-center justify-between">

                        {{-- KEMBALI --}}
                        <a
                            href="{{ route('admin.dashboard', ['menu' => 'kendaraan']) }}"
                            class="rounded-lg border border-slate-800 bg-[#111111] px-5 py-3 text-sm font-semibold text-slate-300 transition hover:border-slate-700 hover:bg-slate-800">
                            ← Kembali
                        </a>

                        {{-- SIMPAN --}}
                        <button
                            type="submit"
                            class="rounded-lg bg-red-500 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-red-500/10 transition hover:bg-red-600">
                            Simpan Kendaraan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
</html>
