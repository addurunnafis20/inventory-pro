@extends('layouts.master')

@section('content')

<style>
.laporan-page {
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: #17243b;
}

/* HERO */
.laporan-hero {
    background: linear-gradient(120deg, #10243d, #123b54 65%, #087f83);
    border-radius: 20px;
    padding: 35px;
    color: white;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
}

.laporan-hero::after {
    content: "";
    position: absolute;
    width: 260px;
    height: 260px;
    border: 40px solid rgba(255,255,255,.06);
    border-radius: 50%;
    right: -60px;
    top: -120px;
}

.laporan-hero h2 {
    color: white;
    font-size: 26px;
    font-weight: 800;
    margin-bottom: 10px;
}

.laporan-hero p {
    color: #c0d1df;
    font-size: 13px;
    margin: 0;
    max-width: 550px;
}

.hero-label {
    color: #55d8cb;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
    margin-bottom: 12px;
}

/* SECTION */
.laporan-section-title {
    font-size: 18px;
    font-weight: 800;
    color: #17243b;
    margin-bottom: 7px;
}

.laporan-section-desc {
    font-size: 12px;
    color: #8995a7;
    margin-bottom: 22px;
}

/* CARD */
.laporan-card {
    background: white;
    border: 1px solid #edf0f5;
    border-radius: 19px;
    padding: 27px;
    height: 100%;
    box-shadow: 0 6px 25px rgba(30,50,80,.05);
    transition: .3s;
}

.laporan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(30,50,80,.10);
}

.laporan-icon {
    width: 65px;
    height: 65px;
    border-radius: 17px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 27px;
    margin-bottom: 22px;
}

.pdf-icon {
    background: #fff0ef;
    color: #e74c3c;
}

.excel-icon {
    background: #e8f8ef;
    color: #159957;
}

.laporan-card h5 {
    font-size: 17px;
    font-weight: 800;
    color: #17243b;
    margin-bottom: 10px;
}

.laporan-card > p {
    font-size: 12px;
    color: #8995a7;
    line-height: 1.8;
    min-height: 43px;
}

.format-badge {
    display: inline-block;
    padding: 7px 12px;
    border-radius: 7px;
    font-size: 10px;
    font-weight: 800;
    margin: 12px 0 18px;
}

.pdf-badge {
    background: #fff0ef;
    color: #d94b42;
}

.excel-badge {
    background: #e8f8ef;
    color: #159957;
}

.laporan-info {
    background: #f7f9fc;
    border-radius: 12px;
    padding: 17px;
    margin-bottom: 22px;
}

.laporan-info-row {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    padding: 9px 0;
    border-bottom: 1px solid #e9edf3;
    font-size: 11px;
}

.laporan-info-row:last-child {
    border-bottom: none;
}

.laporan-info-row span {
    color: #8995a7;
}

.laporan-info-row strong {
    color: #25364b;
    text-align: right;
}

.laporan-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 14px;
    border-radius: 11px;
    color: white !important;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none !important;
    transition: .25s;
}

.pdf-button {
    background: linear-gradient(110deg, #d94343, #f06b5e);
    box-shadow: 0 7px 18px rgba(217,67,67,.18);
}

.excel-button {
    background: linear-gradient(110deg, #087f55, #20ad72);
    box-shadow: 0 7px 18px rgba(32,173,114,.18);
}

.laporan-button:hover {
    transform: translateY(-3px);
    color: white;
}

/* INFORMATION */
.laporan-bottom {
    background: white;
    border: 1px solid #edf0f5;
    border-radius: 17px;
    padding: 23px;
    margin-top: 25px;
}

.info-item {
    display: flex;
    align-items: flex-start;
    gap: 13px;
}

.info-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: #e7f5f5;
    color: #0b9c91;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.info-item strong {
    display: block;
    color: #25364b;
    font-size: 12px;
    margin-bottom: 5px;
}

.info-item small {
    color: #8995a7;
    font-size: 11px;
    line-height: 1.7;
}

@media(max-width: 768px) {
    .laporan-hero {
        padding: 25px 20px;
    }

    .laporan-card {
        padding: 22px;
        margin-bottom: 18px;
    }
}
</style>


<div class="laporan-page">

    <!-- HERO -->
    <div class="laporan-hero">
        <div style="position:relative;z-index:2">

            <div class="hero-label">
                INVENTORY MANAGEMENT SYSTEM
            </div>

            <h2>
                <i class="fas fa-file-alt mr-2"></i>
                Laporan Inventaris
            </h2>

            <p>
                Pusat pengelolaan laporan inventaris.
                Unduh dan cetak data barang dengan mudah
                dalam format PDF maupun Excel.
            </p>

        </div>
    </div>


    <!-- JUDUL -->
    <div class="mb-4">
        <h5 class="laporan-section-title">
            Pilih Format Laporan
        </h5>

        <p class="laporan-section-desc">
            Silakan pilih format dokumen sesuai kebutuhan Anda.
        </p>
    </div>


    <div class="row">

        <!-- PDF -->
        <div class="col-lg-6 mb-4">

            <div class="laporan-card">

                <div class="laporan-icon pdf-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>

                <h5>Laporan PDF</h5>

                <p>
                    Cetak dan simpan laporan data barang
                    dalam bentuk dokumen PDF yang rapi
                    dan siap digunakan.
                </p>

                <span class="format-badge pdf-badge">
                    <i class="fas fa-file-pdf mr-1"></i>
                    PDF DOCUMENT
                </span>

                <div class="laporan-info">

                    <div class="laporan-info-row">
                        <span>Nama Dokumen</span>
                        <strong>Laporan Data Barang</strong>
                    </div>

                    <div class="laporan-info-row">
                        <span>Format File</span>
                        <strong>.PDF</strong>
                    </div>

                    <div class="laporan-info-row">
                        <span>Tanggal Cetak</span>
                        <strong>
                            {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                        </strong>
                    </div>

                    <div class="laporan-info-row">
                        <span>Kegunaan</span>
                        <strong>Cetak / Arsip</strong>
                    </div>

                </div>

                <a href="{{ url('/admin/laporan/barang') }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="laporan-button pdf-button">

                    <i class="fas fa-print"></i>
                    Cetak Laporan PDF
                    <i class="fas fa-arrow-right"></i>

                </a>

            </div>

        </div>


        <!-- EXCEL -->
        <div class="col-lg-6 mb-4">

            <div class="laporan-card">

                <div class="laporan-icon excel-icon">
                    <i class="fas fa-file-excel"></i>
                </div>

                <h5>Laporan Excel</h5>

                <p>
                    Unduh data inventaris dalam format Excel
                    untuk mempermudah pengolahan,
                    penghitungan, dan analisis data barang.
                </p>

                <span class="format-badge excel-badge">
                    <i class="fas fa-file-excel mr-1"></i>
                    EXCEL SPREADSHEET
                </span>

                <div class="laporan-info">

                    <div class="laporan-info-row">
                        <span>Nama Dokumen</span>
                        <strong>Laporan Data Barang</strong>
                    </div>

                    <div class="laporan-info-row">
                        <span>Format File</span>
                        <strong>.XLSX</strong>
                    </div>

                    <div class="laporan-info-row">
                        <span>Tanggal Unduh</span>
                        <strong>
                            {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                        </strong>
                    </div>

                    <div class="laporan-info-row">
                        <span>Kegunaan</span>
                        <strong>Olah Data / Arsip</strong>
                    </div>

                </div>

                <a href="{{ url('/admin/laporan/excel') }}"
                   class="laporan-button excel-button">

                    <i class="fas fa-download"></i>
                    Download Laporan Excel
                    <i class="fas fa-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>


    <!-- INFORMASI -->
    <div class="laporan-bottom">

        <h5 style="font-size:15px;font-weight:800;margin-bottom:22px;color:#17243b">
            <i class="fas fa-info-circle mr-2"
               style="color:#0b9c91"></i>
            Informasi Laporan
        </h5>

        <div class="row">

            <div class="col-md-4 mb-3">
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-database"></i>
                    </div>

                    <div>
                        <strong>Data Terintegrasi</strong>
                        <small>
                            Laporan mengambil data barang
                            langsung dari database inventaris.
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>

                    <div>
                        <strong>Data Tersimpan</strong>
                        <small>
                            Data inventaris tetap tersimpan
                            dan tidak berubah saat laporan diunduh.
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-file-download"></i>
                    </div>

                    <div>
                        <strong>Mudah Digunakan</strong>
                        <small>
                            Pilih format laporan dan
                            gunakan sesuai kebutuhan.
                        </small>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection