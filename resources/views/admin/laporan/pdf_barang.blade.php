<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Inventaris Barang</title>

    <style>
        @page {
            margin: 35px 35px 45px 35px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #263449;
            font-size: 11px;
        }

        .header {
            background-color: #10243d;
            color: white;
            padding: 22px;
            border-radius: 8px;
        }

        .brand {
            font-size: 19px;
            font-weight: bold;
            color: #ffffff;
        }

        .brand span {
            color: #42d5cb;
        }

        .subtitle {
            font-size: 9px;
            color: #c4d3e1;
            margin-top: 5px;
        }

        .header-line {
            height: 4px;
            background-color: #16b8b0;
            margin-top: 15px;
        }

        .report-title {
            margin-top: 28px;
            margin-bottom: 5px;
            font-size: 20px;
            font-weight: bold;
            color: #10243d;
        }

        .description {
            color: #78879a;
            font-size: 10px;
        }

        .summary {
            width: 100%;
            margin-top: 22px;
            margin-bottom: 22px;
            border-collapse: separate;
            border-spacing: 8px 0;
        }

        .summary td {
            background-color: #f0f7fa;
            border: 1px solid #e1ebf0;
            padding: 13px;
            width: 33.33%;
        }

        .summary-label {
            color: #718096;
            font-size: 9px;
        }

        .summary-value {
            color: #10243d;
            font-size: 17px;
            font-weight: bold;
            margin-top: 7px;
        }

        .section-title {
            font-size: 12px;
            font-weight: bold;
            color: #10243d;
            margin-bottom: 12px;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
        }

        table.data thead th {
            background-color: #10243d;
            color: white;
            padding: 12px 9px;
            text-align: left;
            font-size: 10px;
            border: 1px solid #10243d;
        }

        table.data tbody td {
            padding: 11px 9px;
            border: 1px solid #e2e8f0;
            font-size: 10px;
        }

        table.data tbody tr:nth-child(even) {
            background-color: #f3f8fb;
        }

        .center {
            text-align: center;
        }

        .stock {
            color: #087f83;
            font-weight: bold;
            text-align: center;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #8995a7;
        }

        .footer {
            margin-top: 30px;
            padding-top: 12px;
            border-top: 2px solid #16b8b0;
            font-size: 9px;
            color: #8995a7;
        }

        .footer table {
            width: 100%;
        }

        .footer-right {
            text-align: right;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <div class="brand">
            INVENTORY<span>.</span> PRO
        </div>

        <div class="subtitle">
            INVENTORY MANAGEMENT SYSTEM
            <br>
            Sistem Informasi Manajemen Inventaris Barang
        </div>

        <div class="header-line"></div>
    </div>

    <!-- JUDUL -->
    <div class="report-title">
        LAPORAN DATA BARANG
    </div>

    <div class="description">
        Dokumen resmi rekapitulasi data inventaris barang.
    </div>

    <!-- RINGKASAN -->
    <table class="summary">
        <tr>
            <td>
                <div class="summary-label">TOTAL JENIS BARANG</div>
                <div class="summary-value">
                    {{ $data->count() }}
                </div>
            </td>

            <td>
                <div class="summary-label">TOTAL STOK</div>
                <div class="summary-value">
                    {{ number_format($data->sum('stok'), 0, ',', '.') }}
                </div>
            </td>

            <td>
                <div class="summary-label">TANGGAL CETAK</div>
                <div class="summary-value" style="font-size:12px">
                    {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                </div>
            </td>
        </tr>
    </table>

    <!-- TABEL BARANG -->
    <div class="section-title">
        DETAIL INVENTARIS BARANG
    </div>

    <table class="data">

        <thead>
            <tr>
                <th width="8%" class="center">NO</th>
                <th width="22%">KODE BARANG</th>
                <th width="45%">NAMA BARANG</th>
                <th width="25%" class="center">STOK</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($data as $key => $item)
                <tr>
                    <td class="center">
                        {{ $key + 1 }}
                    </td>

                    <td>
                        {{ $item->kode }}
                    </td>

                    <td>
                        {{ $item->nama }}
                    </td>

                    <td class="stock">
                        {{ number_format($item->stok, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">
                        Belum ada data barang yang tersedia.
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

    <!-- FOOTER -->
    <div class="footer">
        <table>
            <tr>
                <td>
                    INVENTORY PRO
                    <br>
                    Inventory Management System
                </td>

                <td class="footer-right">
                    Dokumen dibuat secara otomatis oleh sistem.
                    <br>
                    © {{ date('Y') }} Inventory Pro
                </td>
            </tr>
        </table>
    </div>

</body>
</html>