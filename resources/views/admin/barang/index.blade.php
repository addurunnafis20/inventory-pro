@extends('layouts.master')

@section('content')

<style>
/* =====================================
   INVENTORY PRO - DATA BARANG
===================================== */

.barang-page {
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: #17243b;
    padding-bottom: 25px;
}

/* Header */
.barang-hero {
    position: relative;
    overflow: hidden;
    background: linear-gradient(120deg, #10243d, #123b54 65%, #087f83);
    border-radius: 20px;
    padding: 30px 32px;
    margin-bottom: 25px;
    color: white;
}

.barang-hero::after {
    content: "";
    position: absolute;
    width: 230px;
    height: 230px;
    border: 35px solid rgba(255,255,255,.05);
    border-radius: 50%;
    right: -40px;
    top: -130px;
}

.barang-hero-content {
    position: relative;
    z-index: 2;
}

.barang-hero h2 {
    color: white;
    font-size: 25px;
    font-weight: 800;
    margin-bottom: 9px;
}

.barang-hero p {
    color: #c0d1df;
    font-size: 12px;
    margin: 0;
}

.barang-label {
    color: #55d8cb;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2px;
    margin-bottom: 12px;
}

/* Summary */
.barang-summary {
    background: white;
    border: 1px solid #edf0f5;
    border-radius: 16px;
    padding: 19px 22px;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 5px 20px rgba(30,50,80,.035);
}

.barang-summary-left {
    display: flex;
    align-items: center;
    gap: 14px;
}

.barang-summary-icon {
    width: 48px;
    height: 48px;
    background: #e0f8f4;
    color: #0b9c91;
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.barang-summary-label {
    font-size: 11px;
    color: #929daf;
    margin-bottom: 5px;
}

.barang-summary-number {
    font-size: 22px;
    font-weight: 800;
    color: #17243b;
}

.barang-add-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    background: linear-gradient(110deg, #087f91, #16b8b0);
    color: white !important;
    padding: 13px 19px;
    border-radius: 11px;
    text-decoration: none !important;
    font-size: 11px;
    font-weight: 800;
    box-shadow: 0 7px 18px rgba(22,184,176,.2);
    transition: .25s;
}

.barang-add-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 22px rgba(22,184,176,.3);
}

/* Table Card */
.barang-table-card {
    background: white;
    border: 1px solid #edf0f5;
    border-radius: 17px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(30,50,80,.035);
}

.barang-card-header {
    padding: 22px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    border-bottom: 1px solid #edf0f5;
}

.barang-card-header h5 {
    font-size: 15px;
    font-weight: 800;
    color: #17243b;
    margin: 0 0 5px;
}

.barang-card-header p {
    font-size: 11px;
    color: #929daf;
    margin: 0;
}

/* Search */
.barang-search {
    position: relative;
    width: 240px;
}

.barang-search i {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ba7b7;
    font-size: 12px;
}

.barang-search input {
    width: 100%;
    height: 40px;
    border: 1px solid #e6ebf1;
    background: #f8fafc;
    border-radius: 9px;
    padding: 0 12px 0 36px;
    font-family: inherit;
    font-size: 11px;
    outline: none;
    transition: .2s;
}

.barang-search input:focus {
    border-color: #16b8b0;
    background: white;
    box-shadow: 0 0 0 3px rgba(22,184,176,.09);
}

/* Table */
.barang-table-wrapper {
    padding: 10px 22px 20px;
}

.barang-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin: 0;
}

.barang-table thead th {
    background: #f6f9fc;
    color: #8793a5;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .6px;
    padding: 16px 15px;
    border: none;
    white-space: nowrap;
}

.barang-table thead th:first-child {
    border-radius: 9px 0 0 9px;
}

.barang-table thead th:last-child {
    border-radius: 0 9px 9px 0;
}

.barang-table tbody td {
    padding: 17px 15px;
    border-bottom: 1px solid #f0f2f6;
    font-size: 12px;
    color: #58677c;
    vertical-align: middle;
}

.barang-table tbody tr {
    transition: .2s;
}

.barang-table tbody tr:hover {
    background: #f8fcfb;
}

.barang-table tbody tr:last-child td {
    border-bottom: none;
}

.barang-number {
    width: 30px;
    height: 30px;
    border-radius: 9px;
    background: #f0f4f8;
    color: #65748a;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 800;
}

.barang-code {
    display: inline-block;
    padding: 6px 10px;
    background: #eef5ff;
    color: #4285d4;
    border-radius: 7px;
    font-size: 10px;
    font-weight: 800;
}

.barang-name {
    font-weight: 700;
    color: #25364b;
}

.stok-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 11px;
    border-radius: 8px;
    font-size: 10px;
    font-weight: 800;
}

.stok-aman {
    background: #e3f8ef;
    color: #15966a;
}

.stok-rendah {
    background: #fff2df;
    color: #d88a25;
}

.stok-habis {
    background: #ffe9e9;
    color: #d34b4b;
}

/* Action Buttons */
.barang-actions {
    display: flex;
    align-items: center;
    gap: 8px;
}

.barang-action {
    width: 33px;
    height: 33px;
    border-radius: 9px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none !important;
    font-size: 12px;
    transition: .2s;
}

.barang-action-edit {
    background: #e8f1ff;
    color: #4285d4 !important;
}

.barang-action-delete {
    background: #ffeaea;
    color: #db5757 !important;
}

.barang-action:hover {
    transform: translateY(-3px);
    filter: brightness(.95);
}

/* Empty State */
.barang-empty {
    text-align: center;
    padding: 55px 15px !important;
}

.barang-empty i {
    font-size: 35px;
    color: #c4ceda;
    margin-bottom: 15px;
}

.barang-empty strong {
    display: block;
    font-size: 13px;
    color: #58677c;
    margin-bottom: 6px;
}

.barang-empty span {
    font-size: 11px;
    color: #9ba7b7;
}

/* Footer */
.barang-table-footer {
    border-top: 1px solid #edf0f5;
    padding: 16px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
}

.barang-table-footer small {
    font-size: 10px;
    color: #929daf;
}

/* Pagination */
.barang-table-footer nav {
    margin-left: auto;
}

.barang-table-footer .pagination {
    margin: 0;
    gap: 4px;
}

.barang-table-footer .page-link {
    border: 1px solid #edf0f5;
    border-radius: 7px;
    color: #65748a;
    font-size: 11px;
    padding: 7px 11px;
}

.barang-table-footer .page-item.active .page-link {
    background: #0b9c91;
    border-color: #0b9c91;
    color: white;
}

.barang-table-footer .page-item.disabled .page-link {
    color: #c4ceda;
}

@media(max-width: 768px) {
    .barang-hero {
        padding: 25px 20px;
    }

    .barang-hero h2 {
        font-size: 21px;
    }

    .barang-summary {
        align-items: flex-start;
        gap: 15px;
        flex-direction: column;
    }

    .barang-add-button {
        width: 100%;
    }

    .barang-card-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .barang-search {
        width: 100%;
    }

    .barang-table-wrapper {
        padding: 10px 12px 15px;
    }

    .barang-table-footer {
        padding: 15px;
    }

    .barang-table-footer nav {
        width: 100%;
        margin-left: 0;
        overflow-x: auto;
    }
}
</style>


<div class="barang-page">

    {{-- HEADER --}}
    <div class="barang-hero">

        <div class="barang-hero-content">

            <div class="barang-label">
                INVENTORY MANAGEMENT SYSTEM
            </div>

            <h2>
                <i class="fas fa-boxes mr-2"></i>
                Data Barang
            </h2>

            <p>
                Kelola seluruh informasi inventaris barang
                dengan lebih mudah, cepat, dan terorganisir.
            </p>

        </div>

    </div>


    {{-- SUMMARY --}}
    <div class="barang-summary">

        <div class="barang-summary-left">

            <div class="barang-summary-icon">
                <i class="fas fa-boxes"></i>
            </div>

            <div>
                <div class="barang-summary-label">
                    TOTAL DATA BARANG
                </div>

                <div class="barang-summary-number">
                    {{ $data->total() }}
                </div>
            </div>

        </div>

        <a href="/admin/barang/tambah" class="barang-add-button">
            <i class="fas fa-plus"></i>
            Tambah Barang
        </a>

    </div>


    {{-- TABLE --}}
    <div class="barang-table-card">

        <div class="barang-card-header">

            <div>
                <h5>
                    <i class="fas fa-list-ul mr-2"
                       style="color:#0b9c91"></i>
                    Daftar Inventaris
                </h5>

                <p>
                    Seluruh data barang yang terdaftar dalam sistem.
                </p>
            </div>

            <div class="barang-search">
                <i class="fas fa-search"></i>

                <input type="text"
                       id="searchBarang"
                       placeholder="Cari kode atau nama barang...">
            </div>

        </div>


        <div class="table-responsive barang-table-wrapper">

            <table class="barang-table" id="tabelBarang">

                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE BARANG</th>
                        <th>NAMA BARANG</th>
                        <th>STOK</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($data as $key => $item)

                        <tr>

                            <td>
                                <span class="barang-number">
                                    {{ $data->firstItem() + $key }}
                                </span>
                            </td>

                            <td>
                                <span class="barang-code">
                                    {{ $item->kode }}
                                </span>
                            </td>

                            <td>
                                <span class="barang-name">
                                    {{ $item->nama }}
                                </span>
                            </td>

                            <td>

                                @if ((int) $item->stok <= 0)

                                    <span class="stok-badge stok-habis">
                                        <i class="fas fa-times-circle"></i>
                                        {{ $item->stok }} Habis
                                    </span>

                                @elseif ((int) $item->stok <= 5)

                                    <span class="stok-badge stok-rendah">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $item->stok }} Rendah
                                    </span>

                                @else

                                    <span class="stok-badge stok-aman">
                                        <i class="fas fa-check-circle"></i>
                                        {{ $item->stok }} Tersedia
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="barang-actions">

                                    <a href="/admin/barang/edit/{{ $item->id }}"
                                       class="barang-action barang-action-edit"
                                       title="Edit Barang">

                                        <i class="fas fa-pen"></i>

                                    </a>

                                    <a href="/admin/barang/delete/{{ $item->id }}"
                                       class="barang-action barang-action-delete"
                                       title="Hapus Barang"
                                       onclick="return confirm('Yakin ingin menghapus barang ini?');">

                                        <i class="fas fa-trash-alt"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr id="emptyBarang">
                            <td colspan="5" class="barang-empty">

                                <i class="fas fa-box-open"></i>

                                <strong>Belum Ada Data Barang</strong>

                                <span>
                                    Silakan tambahkan data barang terlebih dahulu.
                                </span>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div id="searchEmpty"
                 class="barang-empty"
                 style="display:none">

                <i class="fas fa-search"></i>

                <strong>Barang Tidak Ditemukan</strong>

                <span>Coba gunakan kata pencarian lainnya.</span>

            </div>

        </div>


        {{-- TABLE FOOTER --}}
        <div class="barang-table-footer">

            <small>
                Menampilkan {{ $data->count() }} data
                dari total {{ $data->total() }} barang.
            </small>

            <nav>
                {{ $data->links() }}
            </nav>

        </div>

    </div>

</div>


{{-- SEARCH SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchBarang');
    const table = document.getElementById('tabelBarang');
    const searchEmpty = document.getElementById('searchEmpty');

    if (!searchInput || !table) return;

    searchInput.addEventListener('input', function () {

        const keyword = this.value.toLowerCase().trim();

        const rows = table.querySelectorAll('tbody tr');
        let visibleRows = 0;

        rows.forEach(function (row) {

            if (row.id === 'emptyBarang') return;

            const text = row.innerText.toLowerCase();
            const match = text.includes(keyword);

            row.style.display = match ? '' : 'none';

            if (match) visibleRows++;

        });

        searchEmpty.style.display =
            visibleRows === 0 && rows.length > 0 &&
            !document.getElementById('emptyBarang')
            ? 'block'
            : 'none';

    });

});
</script>

@endsection