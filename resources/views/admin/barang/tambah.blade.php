@extends('layouts.master')

@section('content')

<style>
    /* ===== ADD PRODUCT PAGE ===== */

    .product-page {
        font-family: 'Plus Jakarta Sans', sans-serif;
        padding-bottom: 30px;
    }

    .product-heading {
        margin-bottom: 28px;
    }

    .product-heading .subtitle {
        color: #8993a4;
        font-size: 13px;
        margin-top: 7px;
    }

    .product-heading h3 {
        color: #17243b;
        font-weight: 800;
        font-size: 25px;
        margin-bottom: 0;
    }

    .product-breadcrumb {
        font-size: 12px;
        color: #94a3b8;
        margin-bottom: 10px;
    }

    .product-breadcrumb span {
        color: #0eaaa5;
        font-weight: 700;
    }

    .product-card {
        background: #fff;
        border-radius: 20px;
        border: 1px solid #edf0f5;
        box-shadow: 0 8px 35px rgba(25, 42, 70, .06);
        overflow: hidden;
    }

    .product-card-header {
        padding: 25px 30px;
        border-bottom: 1px solid #edf0f5;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .product-icon {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        background: #e7f8f6;
        color: #0eaaa5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .product-card-header h5 {
        font-weight: 800;
        color: #17243b;
        margin: 0 0 5px;
        font-size: 16px;
    }

    .product-card-header p {
        margin: 0;
        color: #94a3b8;
        font-size: 12px;
    }

    .product-card-body {
        padding: 32px;
    }

    .form-section-title {
        font-size: 13px;
        font-weight: 800;
        color: #17243b;
        margin-bottom: 23px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .form-section-title i {
        color: #0eaaa5;
    }

    .product-form-group {
        margin-bottom: 25px;
    }

    .product-form-group label {
        display: block;
        color: #344054;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .product-form-group label span {
        color: #ef5555;
    }

    .product-input-wrapper {
        position: relative;
    }

    .product-input-wrapper i {
        position: absolute;
        left: 17px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 15px;
        pointer-events: none;
    }

    .product-input {
        width: 100%;
        height: 53px;
        border: 1px solid #e5eaf1;
        border-radius: 12px;
        background: #f9fafc;
        padding: 0 17px 0 46px;
        font-size: 13px;
        color: #17243b;
        outline: none;
        transition: .25s;
    }

    .product-input:focus {
        border-color: #0eaaa5;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(14,170,165,.09);
    }

    .product-input::placeholder {
        color: #b0bac8;
    }

    .product-hint {
        font-size: 11px;
        color: #94a3b8;
        margin-top: 8px;
    }

    .product-divider {
        border: 0;
        border-top: 1px solid #edf0f5;
        margin: 12px 0 25px;
    }

    .product-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-product-back {
        height: 48px;
        padding: 0 22px;
        border-radius: 11px;
        border: 1px solid #e5eaf1;
        background: white;
        color: #64748b;
        font-size: 13px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 9px;
        text-decoration: none !important;
        transition: .25s;
    }

    .btn-product-back:hover {
        background: #f1f5f9;
        color: #17243b;
    }

    .btn-product-save {
        height: 48px;
        padding: 0 27px;
        border: none;
        border-radius: 11px;
        background: linear-gradient(110deg, #087f91, #16b8b0);
        color: white;
        font-size: 13px;
        font-weight: 800;
        cursor: pointer;
        box-shadow: 0 7px 18px rgba(14,170,165,.20);
        transition: .25s;
    }

    .btn-product-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 23px rgba(14,170,165,.30);
    }

    .product-info {
        margin-top: 23px;
        padding: 16px 18px;
        border-radius: 12px;
        background: #f0faf9;
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .product-info i {
        color: #0eaaa5;
        margin-top: 2px;
    }

    .product-info p {
        font-size: 11px;
        line-height: 1.7;
        color: #63817f;
        margin: 0;
    }

    .product-error {
        background: #fff0f0;
        border: 1px solid #ffdada;
        color: #c03939;
        padding: 14px 17px;
        border-radius: 11px;
        font-size: 12px;
        margin-bottom: 22px;
    }

    @media(max-width: 576px) {
        .product-card-body {
            padding: 22px 18px;
        }

        .product-card-header {
            padding: 20px;
        }

        .product-heading h3 {
            font-size: 21px;
        }

        .product-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-product-back,
        .btn-product-save {
            justify-content: center;
            width: 100%;
        }
    }
</style>

<div class="product-page">

    <!-- PAGE HEADING -->
    <div class="product-heading">

        <div class="product-breadcrumb">
            Dashboard / Data Barang / <span>Tambah Barang</span>
        </div>

        <h3>Tambah Barang</h3>

        <p class="subtitle">
            Tambahkan informasi barang baru ke dalam sistem inventaris.
        </p>

    </div>

    <!-- FORM CARD -->
    <div class="row">
        <div class="col-lg-9 col-xl-8">

            <div class="product-card">

                <!-- CARD HEADER -->
                <div class="product-card-header">

                    <div class="product-icon">
                        <i class="fas fa-box-open"></i>
                    </div>

                    <div>
                        <h5>Informasi Barang</h5>
                        <p>Lengkapi seluruh informasi barang di bawah ini.</p>
                    </div>

                </div>

                <!-- CARD BODY -->
                <div class="product-card-body">

                    @if ($errors->any())
                        <div class="product-error">
                            <strong>Terjadi kesalahan!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-section-title">
                        <i class="fas fa-clipboard-list"></i>
                        DETAIL PRODUK
                    </div>

                    <form method="post" action="/admin/barang/simpan">

                        @csrf

                        <!-- KODE BARANG -->
                        <div class="product-form-group">

                            <label>
                                Kode Barang <span>*</span>
                            </label>

                            <div class="product-input-wrapper">
                                <i class="fas fa-barcode"></i>

                                <input
                                    type="text"
                                    class="product-input"
                                    name="kode"
                                    placeholder="Contoh: BRG001"
                                    value="{{ old('kode') }}"
                                    required
                                >
                            </div>

                            <div class="product-hint">
                                Masukkan kode unik untuk identifikasi barang.
                            </div>

                        </div>

                        <!-- NAMA BARANG -->
                        <div class="product-form-group">

                            <label>
                                Nama Barang <span>*</span>
                            </label>

                            <div class="product-input-wrapper">
                                <i class="fas fa-box"></i>

                                <input
                                    type="text"
                                    class="product-input"
                                    name="nama"
                                    placeholder="Masukkan nama barang"
                                    value="{{ old('nama') }}"
                                    required
                                >
                            </div>

                            <div class="product-hint">
                                Tuliskan nama barang secara jelas dan lengkap.
                            </div>

                        </div>

                        <!-- STOK -->
                        <div class="product-form-group">

                            <label>
                                Jumlah Stok <span>*</span>
                            </label>

                            <div class="product-input-wrapper">
                                <i class="fas fa-cubes"></i>

                                <input
                                    type="number"
                                    class="product-input"
                                    name="stok"
                                    placeholder="Masukkan jumlah stok"
                                    value="{{ old('stok') }}"
                                    min="0"
                                    required
                                >
                            </div>

                            <div class="product-hint">
                                Masukkan jumlah persediaan barang yang tersedia.
                            </div>

                        </div>

                        <hr class="product-divider">

                        <!-- BUTTONS -->
                        <div class="product-actions">

                            <a href="/admin/barang" class="btn-product-back">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </a>

                            <button type="submit" class="btn-product-save">
                                <i class="fas fa-save mr-2"></i>
                                SIMPAN BARANG
                                <i class="fas fa-arrow-right ml-2"></i>
                            </button>

                        </div>

                    </form>

                    <!-- INFORMATION -->
                    <div class="product-info">
                        <i class="fas fa-shield-alt"></i>

                        <p>
                            <strong>Informasi:</strong>
                            Pastikan kode, nama, dan jumlah stok barang
                            sudah benar sebelum menyimpan data ke sistem.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection