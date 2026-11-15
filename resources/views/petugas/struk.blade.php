<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Struk Parkir - KABASA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white !important;
            }

            .struk {
                box-shadow: none !important;
                border: none !important;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-zinc-950 flex items-center justify-center p-6">

    <div class="w-full max-w-md">

        {{-- STRUK --}}
        <div class="struk bg-white rounded-2xl shadow-2xl overflow-hidden">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r from-red-600 to-red-900 text-white text-center p-6">

                <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center
                            rounded-full bg-white text-red-600 text-2xl font-black">
                    K
                </div>

                <h1 class="text-2xl font-black tracking-wide">
                    KABASA
                </h1>

                <p class="text-sm text-red-100">
                    Parking System
                </p>

                <div class="mt-4 border-t border-red-400/40 pt-3">
                    <p class="text-xs uppercase tracking-widest text-red-100">
                        STRUK PARKIR
                    </p>
                </div>

            </div>

            {{-- ISI STRUK --}}
            <div class="p-6 text-zinc-800">

                {{-- ID TRANSAKSI --}}
                <div class="mb-5 text-center">
                    <p class="text-xs text-zinc-500">
                        ID PARKIR
                    </p>

                    <p class="text-lg font-black text-red-600">
                        {{ $transaksi->id_parkir }}
                    </p>
                </div>

                <div class="space-y-4">

                    {{-- KENDARAAN --}}
                    <div class="flex justify-between gap-4 border-b border-zinc-200 pb-3">
                        <span class="text-sm text-zinc-500">
                            Kendaraan
                        </span>

                        <span class="text-sm font-bold text-right">
                            {{ $kendaraan->jenis_kendaraan ?? '-' }}
                        </span>
                    </div>

                    {{-- WARNA --}}
                    <div class="flex justify-between gap-4 border-b border-zinc-200 pb-3">
                        <span class="text-sm text-zinc-500">
                            Warna
                        </span>

                        <span class="text-sm font-bold text-right">
                            {{ $kendaraan->warna ?? '-' }}
                        </span>
                    </div>

                    {{-- PEMILIK --}}
                    <div class="flex justify-between gap-4 border-b border-zinc-200 pb-3">
                        <span class="text-sm text-zinc-500">
                            Pemilik
                        </span>

                        <span class="text-sm font-bold text-right">
                            {{ $kendaraan->pemilik ?? '-' }}
                        </span>
                    </div>

                    {{-- AREA --}}
                    <div class="flex justify-between gap-4 border-b border-zinc-200 pb-3">
                        <span class="text-sm text-zinc-500">
                            Area Parkir
                        </span>

                        <span class="text-sm font-bold text-right">
                            {{ $area->nama_area ?? '-' }}
                        </span>
                    </div>

                    {{-- WAKTU MASUK --}}
                    <div class="flex justify-between gap-4 border-b border-zinc-200 pb-3">
                        <span class="text-sm text-zinc-500">
                            Waktu Masuk
                        </span>

                        <span class="text-sm font-bold text-right">
                            {{ \Carbon\Carbon::parse($transaksi->waktu_masuk)->format('d-m-Y H:i') }}
                        </span>
                    </div>

                    {{-- WAKTU KELUAR --}}
                    <div class="flex justify-between gap-4 border-b border-zinc-200 pb-3">
                        <span class="text-sm text-zinc-500">
                            Waktu Keluar
                        </span>

                        <span class="text-sm font-bold text-right">
                            {{ \Carbon\Carbon::parse($transaksi->waktu_keluar)->format('d-m-Y H:i') }}
                        </span>
                    </div>

                    {{-- DURASI --}}
                    <div class="flex justify-between gap-4 border-b border-zinc-200 pb-3">
                        <span class="text-sm text-zinc-500">
                            Durasi
                        </span>

                        <span class="text-sm font-bold text-right">
                            {{ $transaksi->durasi_jam }} Jam
                        </span>
                    </div>

                    {{-- TARIF --}}
                    <div class="flex justify-between gap-4 border-b border-zinc-200 pb-3">
                        <span class="text-sm text-zinc-500">
                            Tarif / Jam
                        </span>

                        <span class="text-sm font-bold text-right">
                            Rp {{ number_format($tarif->tarif_per_jam ?? 0, 0, ',', '.') }}
                        </span>
                    </div>

                </div>

                {{-- TOTAL --}}
                <div class="mt-6 rounded-xl bg-zinc-100 p-4">

                    <div class="flex items-center justify-between">

                        <span class="font-bold text-zinc-600">
                            TOTAL BAYAR
                        </span>

                        <span class="text-xl font-black text-red-600">
                            Rp {{ number_format($transaksi->biaya_total ?? 0, 0, ',', '.') }}
                        </span>

                    </div>

                </div>

                {{-- FOOTER --}}
                <div class="mt-6 text-center">

                    <p class="text-sm font-bold text-zinc-700">
                        Terima kasih telah menggunakan
                    </p>

                    <p class="text-sm font-black text-red-600">
                        KABASA Parking System
                    </p>

                    <p class="mt-2 text-xs text-zinc-400">
                        Simpan struk ini sebagai bukti pembayaran.
                    </p>

                </div>

            </div>

        </div>

        {{-- BUTTON --}}
        <div class="no-print mt-5 flex justify-center gap-3">

            <button
                onclick="window.print()"
                class="rounded-xl bg-red-600 px-6 py-3
                       font-bold text-white shadow-lg
                       transition hover:bg-red-700">
                🖨️ Cetak Struk
            </button>

            <a
                href="{{ route('petugas.transaksi') }}"
                class="rounded-xl bg-zinc-800 px-6 py-3
                       font-bold text-white shadow-lg
                       transition hover:bg-zinc-700">
                ← Kembali
            </a>

        </div>

    </div>

</body>
</html>