@extends('layouts.master')

@section('content')

<style>
/* =========================================
   INVENTORY PRO - DASHBOARD DESIGN
========================================= */

.inv-dashboard {
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: #17243b;
    padding-bottom: 25px;
}

.inv-dashboard * {
    box-sizing: border-box;
}

/* Welcome Banner */
.inv-welcome {
    position: relative;
    overflow: hidden;
    background: linear-gradient(120deg, #10243d, #123b54 65%, #087f83);
    border-radius: 20px;
    padding: 32px 35px;
    margin-bottom: 28px;
    color: white;
    box-shadow: 0 12px 30px rgba(13, 49, 72, .13);
}

.inv-welcome::before {
    content: "";
    position: absolute;
    width: 260px;
    height: 260px;
    border: 35px solid rgba(255,255,255,.045);
    border-radius: 50%;
    right: 8%;
    top: -140px;
}

.inv-welcome::after {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    background: rgba(30, 213, 190, .09);
    border-radius: 50%;
    right: -45px;
    bottom: -100px;
}

.inv-welcome-content {
    position: relative;
    z-index: 2;
}

.inv-welcome-label {
    color: #55d8cb;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
    margin-bottom: 12px;
}

.inv-welcome h2 {
    font-size: 26px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 9px;
}

.inv-welcome p {
    color: #c0d1df;
    font-size: 13px;
    margin-bottom: 20px;
}

.inv-date {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,.11);
    padding: 9px 14px;
    border-radius: 9px;
    font-size: 11px;
    color: #e3f5f5;
}

/* Section Heading */
.inv-section-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 17px;
}

.inv-section-heading h5 {
    font-size: 16px;
    font-weight: 800;
    color: #17243b;
    margin: 0 0 5px;
}

.inv-section-heading p {
    font-size: 11px;
    color: #929daf;
    margin: 0;
}

/* Statistic Cards */
.inv-stat-card {
    position: relative;
    background: #fff;
    border: 1px solid #edf0f5;
    border-radius: 17px;
    padding: 22px;
    height: 100%;
    min-height: 155px;
    overflow: hidden;
    transition: all .3s ease;
    box-shadow: 0 5px 20px rgba(30, 50, 80, .035);
}

.inv-stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 28px rgba(30, 50, 80, .10);
}

.inv-stat-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 19px;
}

.inv-stat-icon {
    width: 45px;
    height: 45px;
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}

.inv-stat-tag {
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1px;
    padding: 6px 9px;
    border-radius: 20px;
}

.inv-stat-label {
    font-size: 11px;
    font-weight: 700;
    color: #8c97a8;
    margin-bottom: 6px;
}

.inv-stat-number {
    font-size: 27px;
    font-weight: 800;
    color: #17243b;
    letter-spacing: -.7px;
}

.inv-stat-bottom {
    font-size: 10px;
    color: #a0a9b6;
    margin-top: 8px;
}

/* Card Colors */
.stat-teal .inv-stat-icon {
    background: #e0f8f4;
    color: #0b9c91;
}
.stat-teal .inv-stat-tag {
    background: #e0f8f4;
    color: #0b9c91;
}

.stat-blue .inv-stat-icon {
    background: #e8f1ff;
    color: #4285d4;
}
.stat-blue .inv-stat-tag {
    background: #e8f1ff;
    color: #4285d4;
}

.stat-orange .inv-stat-icon {
    background: #fff1df;
    color: #e99a36;
}
.stat-orange .inv-stat-tag {
    background: #fff1df;
    color: #e99a36;
}

.stat-purple .inv-stat-icon {
    background: #f0eaff;
    color: #9171dc;
}
.stat-purple .inv-stat-tag {
    background: #f0eaff;
    color: #9171dc;
}

/* Content Panels */
.inv-panel {
    background: #fff;
    border: 1px solid #edf0f5;
    border-radius: 17px;
    padding: 23px;
    height: 100%;
    box-shadow: 0 5px 20px rgba(30, 50, 80, .035);
}

.inv-panel-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.inv-panel-title h6 {
    font-size: 14px;
    font-weight: 800;
    color: #17243b;
    margin: 0;
}

.inv-panel-title span {
    font-size: 10px;
    color: #9aa4b2;
}

/* Quick Access */
.inv-quick-link {
    display: flex;
    align-items: center;
    padding: 15px;
    border: 1px solid #edf0f5;
    border-radius: 12px;
    margin-bottom: 12px;
    text-decoration: none !important;
    transition: all .25s ease;
}

.inv-quick-link:hover {
    background: #f5fbfa;
    border-color: #b8e8e1;
    transform: translateX(4px);
}

.inv-quick-icon {
    width: 43px;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 17px;
    margin-right: 13px;
}

.inv-quick-info {
    flex: 1;
}

.inv-quick-info strong {
    display: block;
    font-size: 12px;
    color: #24334a;
    margin-bottom: 4px;
}

.inv-quick-info small {
    font-size: 10px;
    color: #9aa4b2;
}

.inv-quick-arrow {
    color: #aab4c1;
    font-size: 13px;
}

/* Information Panel */
.inv-info-box {
    background: linear-gradient(135deg, #effaf8, #f5f9ff);
    border-radius: 13px;
    padding: 18px;
    margin-bottom: 15px;
}

.inv-info-box i {
    color: #0d9e94;
    font-size: 20px;
    margin-bottom: 12px;
}

.inv-info-box h6 {
    font-size: 12px;
    font-weight: 800;
    color: #20334a;
    margin-bottom: 7px;
}

.inv-info-box p {
    font-size: 10px;
    color: #8492a5;
    line-height: 1.8;
    margin: 0;
}

.inv-system-status {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px solid #edf0f5;
    font-size: 11px;
    color: #7d8999;
}

.inv-status-online {
    color: #119b76;
    font-weight: 800;
}

.inv-status-online i {
    font-size: 8px;
    margin-right: 5px;
}

/* Responsive */
@media(max-width: 768px) {
    .inv-welcome {
        padding: 25px 22px;
    }

    .inv-welcome h2 {
        font-size: 21px;
    }

    .inv-stat-card {
        padding: 17px;
        min-height: 145px;
    }

    .inv-stat-number {
        font-size: 23px;
    }
}
</style>


<div class="inv-dashboard">

    {{-- WELCOME BANNER --}}
    <div class="inv-welcome">
        <div class="inv-welcome-content">

            <div class="inv-welcome-label">
                INVENTORY MANAGEMENT SYSTEM
            </div>

            <h2>Selamat Datang, Administrator! 👋</h2>

            <p>
                Kelola inventaris dengan lebih mudah, pantau aktivitas
                barang, dan akses seluruh informasi dalam satu tempat.
            </p>

            <div class="inv-date">
                <i class="fas fa-calendar-alt"></i>
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>

        </div>
    </div>


    {{-- STATISTICS --}}
    <div class="inv-section-heading">
        <div>
            <h5>Ringkasan Inventaris</h5>
            <p>Informasi singkat mengenai kondisi inventaris Anda.</p>
        </div>
    </div>


    <div class="row">

        {{-- TOTAL BARANG --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="inv-stat-card stat-teal">

                <div class="inv-stat-top">
                    <div class="inv-stat-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <span class="inv-stat-tag">INVENTARIS</span>
                </div>

                <div class="inv-stat-label">Jumlah Barang</div>
                <div class="inv-stat-number">40,213</div>
                <div class="inv-stat-bottom">
                    <i class="fas fa-layer-group"></i>
                    Total barang terdaftar
                </div>

            </div>
        </div>


        {{-- BARANG MASUK --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="inv-stat-card stat-blue">

                <div class="inv-stat-top">
                    <div class="inv-stat-icon">
                        <i class="fas fa-dolly-flatbed"></i>
                    </div>
                    <span class="inv-stat-tag">MASUK</span>
                </div>

                <div class="inv-stat-label">Barang Masuk</div>
                <div class="inv-stat-number">534</div>
                <div class="inv-stat-bottom">
                    <i class="fas fa-arrow-down"></i>
                    Total transaksi barang masuk
                </div>

            </div>
        </div>


        {{-- BARANG KELUAR --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="inv-stat-card stat-orange">

                <div class="inv-stat-top">
                    <div class="inv-stat-icon">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                    <span class="inv-stat-tag">KELUAR</span>
                </div>

                <div class="inv-stat-label">Barang Keluar</div>
                <div class="inv-stat-number">213</div>
                <div class="inv-stat-bottom">
                    <i class="fas fa-arrow-up"></i>
                    Total transaksi barang keluar
                </div>

            </div>
        </div>


        {{-- PEGAWAI --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="inv-stat-card stat-purple">

                <div class="inv-stat-top">
                    <div class="inv-stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="inv-stat-tag">PENGGUNA</span>
                </div>

                <div class="inv-stat-label">Jumlah Pegawai</div>
                <div class="inv-stat-number">18</div>
                <div class="inv-stat-bottom">
                    <i class="fas fa-user-check"></i>
                    Total pegawai terdaftar
                </div>

            </div>
        </div>

    </div>


    {{-- LOWER CONTENT --}}
    <div class="row">

        {{-- QUICK ACCESS --}}
        <div class="col-lg-7 mb-4">

            <div class="inv-panel">

                <div class="inv-panel-title">
                    <h6>
                        <i class="fas fa-bolt mr-2"
                           style="color:#0d9e94"></i>
                        Akses Cepat
                    </h6>

                    <span>QUICK MENU</span>
                </div>


                <a href="/admin/barang" class="inv-quick-link">

                    <div class="inv-quick-icon"
                         style="background:#e0f8f4;color:#0b9c91">
                        <i class="fas fa-box-open"></i>
                    </div>

                    <div class="inv-quick-info">
                        <strong>Data Barang</strong>
                        <small>Kelola, tambah, edit, dan hapus data barang.</small>
                    </div>

                    <i class="fas fa-chevron-right inv-quick-arrow"></i>

                </a>


                <a href="/admin/laporan" class="inv-quick-link">

                    <div class="inv-quick-icon"
                         style="background:#e8f1ff;color:#4285d4">
                        <i class="fas fa-file-invoice"></i>
                    </div>

                    <div class="inv-quick-info">
                        <strong>Laporan Inventaris</strong>
                        <small>Lihat dan cetak laporan data barang.</small>
                    </div>

                    <i class="fas fa-chevron-right inv-quick-arrow"></i>

                </a>


                <div class="inv-info-box">

                    <i class="fas fa-lightbulb"></i>

                    <h6>Kelola Inventaris Lebih Efisien</h6>

                    <p>
                        Gunakan menu yang tersedia untuk mempermudah
                        pengelolaan data barang dan memantau informasi
                        inventaris secara terstruktur.
                    </p>

                </div>

            </div>

        </div>


        {{-- SYSTEM INFORMATION --}}
        <div class="col-lg-5 mb-4">

            <div class="inv-panel">

                <div class="inv-panel-title">
                    <h6>
                        <i class="fas fa-server mr-2"
                           style="color:#9171dc"></i>
                        Informasi Sistem
                    </h6>

                    <span>SYSTEM INFO</span>
                </div>


                <div class="inv-info-box">

                    <i class="fas fa-shield-alt"></i>

                    <h6>Inventory Management System</h6>

                    <p>
                        Aplikasi pengelolaan inventaris untuk membantu
                        pencatatan dan pengawasan barang secara digital.
                    </p>

                </div>


                <div class="inv-system-status">
                    <span>Status Aplikasi</span>

                    <span class="inv-status-online">
                        <i class="fas fa-circle"></i>
                        Online
                    </span>
                </div>


                <div class="inv-system-status">
                    <span>Versi Aplikasi</span>
                    <strong>Inventory Pro 1.0</strong>
                </div>


                <div class="inv-system-status">
                    <span>Tahun</span>
                    <strong>{{ date('Y') }}</strong>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection