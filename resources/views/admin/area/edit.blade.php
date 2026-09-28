<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Area - KABASA</title>

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
                href="{{ route('admin.dashboard', ['menu' => 'area']) }}"
                class="text-sm font-medium text-slate-400 transition hover:text-red-500">

                ← Kembali ke Area Parkir

            </a>



            {{-- HEADER --}}

            <div class="mt-5">

                <div class="border-l-4 border-red-500 pl-3">

                    <p
                        class="text-xs font-bold uppercase tracking-[0.25em] text-red-500">

                        KABASA ADMIN

                    </p>


                    <h1
                        class="text-3xl font-bold text-white">

                        Edit Area

                    </h1>

                </div>


                <p
                    class="mt-2 text-sm text-slate-500">

                    Perbarui data area parkir yang sudah tersimpan.

                </p>

            </div>



            {{-- CARD FORM --}}

            <div
                class="mt-6 rounded-2xl border border-slate-800 bg-[#0a0a0a] p-7 shadow-xl">


                {{-- JUDUL CARD --}}

                <div
                    class="border-b border-slate-800 pb-5">

                    <h2
                        class="text-sm font-bold text-white">

                        Informasi Area Parkir

                    </h2>


                    <p
                        class="mt-1 text-xs text-slate-500">

                        Ubah data area parkir dengan benar.

                    </p>

                </div>



                {{-- FORM --}}

                <form
                    action="{{ route('admin.area.update', $area->id_area) }}"
                    method="POST"
                    class="mt-6">

                    @csrf

                    @method('PUT')



                    {{-- ID AREA --}}

                    <div class="mb-5">

                        <label
                            class="mb-2 block text-sm font-semibold text-slate-300">

                            ID Area

                        </label>


                        <input
                            type="text"
                            value="{{ $area->id_area }}"
                            disabled
                            class="w-full rounded-lg border border-slate-800 bg-[#111111] px-4 py-3 text-sm text-slate-500 outline-none">


                        <p
                            class="mt-2 text-xs text-slate-600">

                            ID Area tidak dapat diubah.

                        </p>

                    </div>



                    {{-- NAMA AREA --}}

                    <div class="mb-5">

                        <label
                            class="mb-2 block text-sm font-semibold text-slate-300">

                            Nama Area

                        </label>


                        <input
                            type="text"
                            name="nama_area"
                            value="{{ old('nama_area', $area->nama_area) }}"
                            placeholder="Contoh: Area A"
                            class="w-full rounded-lg border border-slate-800 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-red-500 focus:ring-1 focus:ring-red-500">


                        @error('nama_area')

                            <p
                                class="mt-2 text-xs text-red-400">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- KAPASITAS --}}

                    <div class="mb-5">

                        <label
                            class="mb-2 block text-sm font-semibold text-slate-300">

                            Kapasitas

                        </label>


                        <input
                            type="number"
                            name="kapasitas"
                            value="{{ old('kapasitas', $area->kapasitas) }}"
                            min="0"
                            class="w-full rounded-lg border border-slate-800 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-red-500 focus:ring-1 focus:ring-red-500">


                        @error('kapasitas')

                            <p
                                class="mt-2 text-xs text-red-400">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- TERISI --}}

                    <div class="mb-6">

                        <label
                            class="mb-2 block text-sm font-semibold text-slate-300">

                            Terisi

                        </label>


                        <input
                            type="number"
                            name="terisi"
                            value="{{ old('terisi', $area->terisi) }}"
                            min="0"
                            class="w-full rounded-lg border border-slate-800 bg-[#111111] px-4 py-3 text-sm text-white outline-none transition focus:border-red-500 focus:ring-1 focus:ring-red-500">


                        @error('terisi')

                            <p
                                class="mt-2 text-xs text-red-400">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>



                    {{-- BUTTON --}}

                    <div
                        class="flex items-center justify-between">


                        <a
                            href="{{ route('admin.dashboard', ['menu' => 'area']) }}"
                            class="rounded-lg border border-slate-800 bg-[#111111] px-5 py-3 text-sm font-semibold text-slate-300 transition hover:border-slate-700 hover:bg-slate-800">

                            ← Kembali

                        </a>


                        <button
                            type="submit"
                            class="rounded-lg bg-red-500 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-red-500/10 transition hover:bg-red-600">

                            Simpan Perubahan

                        </button>

                    </div>


                </form>

            </div>

        </div>

    </div>

</body>

</html>