
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cetak Laporan Parkir - KABASA</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            background: #f3f4f6;
            color: #222;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 35px;
            background: white;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #991b1b;
            padding-bottom: 18px;
            margin-bottom: 25px;
        }

        .logo {
            color: #991b1b;
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 3px;
        }

        .header h2 {
            margin: 8px 0;
            font-size: 19px;
        }

        .header p {
            margin: 4px 0;
            color: #555;
        }

        .report-title {
            text-align: center;
            margin-bottom: 25px;
        }

        .report-title h2 {
            margin-bottom: 8px;
            font-size: 18px;
        }

        .period {
            margin-bottom: 20px;
            padding: 12px;
            background: #f9fafb;
            border: 1px solid #ddd;
        }

        .summary {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
        }

        .summary-card {
            flex: 1;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 6px;
        }

        .summary-card p {
            margin: 0 0 8px;
            color: #666;
        }

        .summary-card h3 {
            margin: 0;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 9px 7px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #991b1b;
            color: white;
            text-align: center;
            font-size: 10px;
        }

        td {
            font-size: 10px;
        }

        tbody tr:nth-child(even) {
            background: #f9fafb;
        }

        .center {
            text-align: center;
        }

        .total {
            margin-top: 22px;
            padding: 15px;
            border: 1px solid #991b1b;
            background: #fff7f7;
            text-align: right;
        }

        .total h3 {
            margin: 0;
            color: #991b1b;
            font-size: 17px;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 11px;
        }

        .signature {
            display: inline-block;
            width: 220px;
            text-align: center;
        }

        .signature-space {
            height: 65px;
        }

        .print-button {
            display: block;
            margin: 0 auto 20px;
            padding: 12px 25px;
            border: none;
            border-radius: 7px;
            background: #991b1b;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

           @page {
                size: A4 portrait;
                margin: 0;
            }

            @media print {
                html, body {
                    height: auto !important;
                    min-height: 0 !important;
                    margin: 0 !important;
                    .no-print { display: none !important; }
                }

                body {
                    padding: 12mm !important;
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }

                table, tr, .ttd {
                    break-inside: avoid;
                    page-break-inside: avoid;
                }
            }
            body {
                padding: 0;
                background: white;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .container {
                max-width: none;
                padding: 0;
            }

            .print-button {
                display: none;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
            }
          }
    </style>
</head>

<body>

    <button class="print-button" onclick="window.print()">
        🖨️ Cetak Laporan
    </button>

    <div class="container">

        {{-- HEADER --}}
        <div class="header">

            <div class="logo">KABASA</div>

            <h2>SISTEM INFORMASI PARKIR</h2>

            <p>KABASA PARKING SYSTEM</p>

            <p>Laporan Data Transaksi Parkir Kendaraan</p>

        </div>

        {{-- JUDUL --}}
        <div class="report-title">

            <h2>LAPORAN TRANSAKSI PARKIR</h2>

            <p>
                Periode:
                {{ \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') }}
                -
                {{ \Carbon\Carbon::parse($tanggalSelesai)->format('d/m/Y') }}
            </p>

        </div>

        {{-- PERIODE --}}
        <div class="period">

            <strong>Tanggal Mulai:</strong>
            {{ \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') }}

            &nbsp;&nbsp;&nbsp;

            <strong>Tanggal Selesai:</strong>
            {{ \Carbon\Carbon::parse($tanggalSelesai)->format('d/m/Y') }}

        </div>

        {{-- RINGKASAN --}}
        <div class="summary">

            <div class="summary-card">
                <p>Total Transaksi</p>
                <h3>{{ number_format($transaksi->count()) }}</h3>
            </div>

            <div class="summary-card">
                <p>Kendaraan Selesai</p>
                <h3>
                    {{ number_format($transaksi->where('status', 'keluar')->count()) }}
                </h3>
            </div>

            <div class="summary-card">
                <p>Masih Parkir</p>
                <h3>
                    {{ number_format($transaksi->where('status', 'masuk')->count()) }}
                </h3>
            </div>

        </div>

        {{-- TABEL --}}
        <h3>Data Transaksi Parkir</h3>

        <table>

            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Parkir</th>
                    <th>Pemilik</th>
                    <th>Kendaraan</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Durasi</th>
                    <th>Biaya</th>
                    <th>Petugas</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($transaksi as $item)

                    <tr>

                        <td class="center">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->id_parkir }}
                        </td>

                        <td>
                            {{ $item->pemilik ?? '-' }}
                        </td>

                        <td>
                            {{ $item->jenis_kendaraan ?? '-' }}
                            <br>
                            {{ $item->warna ?? '-' }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('d/m/Y H:i') }}
                        </td>

                        <td>
                            {{ $item->waktu_keluar
                                ? \Carbon\Carbon::parse($item->waktu_keluar)->format('d/m/Y H:i')
                                : '-' }}
                        </td>

                        <td class="center">
                            {{ $item->durasi_jam !== null
                                ? $item->durasi_jam . ' jam'
                                : '-' }}
                        </td>

                        <td>
                            {{ $item->biaya_total !== null
                                ? 'Rp ' . number_format($item->biaya_total, 0, ',', '.')
                                : '-' }}
                        </td>

                        <td>
                            {{ $item->nama_lengkap ?? '-' }}
                        </td>

                        <td class="center">
                            {{ ucfirst($item->status) }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="10" class="center">
                            Belum ada transaksi pada periode ini.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        {{-- TOTAL PENDAPATAN --}}
        <div class="total">

            <h3>
                Total Pendapatan:
                Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
            </h3>

        </div>

        {{-- TANDA TANGAN --}}
        <div class="footer">

            <div class="signature">

                <p>
                    Dicetak pada:
                    {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
                </p>

                <p>Mengetahui,</p>

                <strong>OWNER KABASA</strong>

                <div class="signature-space"></div>

                <strong>
                    {{ auth()->user()->nama_lengkap ?? auth()->user()->nama ?? 'Owner' }}
                </strong>

            </div>

        </div>

    </div>

</body>
</html>
