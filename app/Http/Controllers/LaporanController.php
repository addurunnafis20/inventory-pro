<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Exports\BarangExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function cetak_barang()
    {
        $data = Barang::all();

        $pdf = Pdf::loadView(
            'admin.laporan.pdf_barang',
            compact('data')
        );

        return $pdf->stream('laporan_barang.pdf');
    }

    public function export_barang()
    {
        return Excel::download(
            new BarangExport,
            'laporan_barang.xlsx'
        );
    }
}