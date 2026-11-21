<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BarangExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithTitle,
    WithCustomStartCell,
    WithEvents
{
    private $nomor = 0;

    public function collection()
    {
        return Barang::all();
    }

    public function startCell(): string
    {
        return 'A7';
    }

    public function headings(): array
    {
        return [
            'NO',
            'KODE BARANG',
            'NAMA BARANG',
            'STOK'
        ];
    }

    public function map($barang): array
    {
        return [
            ++$this->nomor,
            $barang->kode,
            $barang->nama,
            $barang->stok
        ];
    }

    public function title(): string
    {
        return 'Data Barang';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                $totalBarang = Barang::count();
                $totalStok = Barang::sum('stok');

                $lastRow = max(7, $sheet->getHighestRow());

                // JUDUL LAPORAN
                $sheet->mergeCells('A1:D1');
                $sheet->setCellValue('A1', 'INVENTORY PRO');

                $sheet->mergeCells('A2:D2');
                $sheet->setCellValue(
                    'A2',
                    'INVENTORY MANAGEMENT SYSTEM'
                );

                $sheet->mergeCells('A4:B4');
                $sheet->setCellValue(
                    'A4',
                    'TOTAL JENIS BARANG'
                );

                $sheet->mergeCells('A5:B5');
                $sheet->setCellValue('A5', $totalBarang);

                $sheet->mergeCells('C4:D4');
                $sheet->setCellValue('C4', 'TOTAL STOK');

                $sheet->mergeCells('C5:D5');
                $sheet->setCellValue('C5', $totalStok);

                // WARNA JUDUL
                $sheet->getStyle('A1:D2')->applyFromArray([
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => [
                            'rgb' => '102B46'
                        ]
                    ],
                    'font' => [
                        'color' => [
                            'rgb' => 'FFFFFF'
                        ],
                        'bold' => true
                    ],
                    'alignment' => [
                        'vertical' => 'center'
                    ]
                ]);

                $sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'size' => 22,
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF']
                    ]
                ]);

                $sheet->getStyle('A2')->applyFromArray([
                    'font' => [
                        'size' => 10,
                        'color' => ['rgb' => '55D8CB']
                    ]
                ]);

                $sheet->getRowDimension(1)->setRowHeight(38);
                $sheet->getRowDimension(2)->setRowHeight(24);

                // KARTU RINGKASAN
                $sheet->getStyle('A4:B5')->applyFromArray([
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => [
                            'rgb' => 'E8F3F8'
                        ]
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => 'thin',
                            'color' => ['rgb' => 'D5E2EB']
                        ]
                    ]
                ]);

                $sheet->getStyle('C4:D5')->applyFromArray([
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => [
                            'rgb' => 'E1F6F1'
                        ]
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => 'thin',
                            'color' => ['rgb' => 'C5E9DF']
                        ]
                    ]
                ]);

                $sheet->getStyle('A4:D4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 10,
                        'color' => ['rgb' => '45647B']
                    ]
                ]);

                $sheet->getStyle('A5:D5')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 20,
                        'color' => ['rgb' => '087F83']
                    ]
                ]);

                // HEADER TABEL
                $sheet->getStyle('A7:D7')->applyFromArray([
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => [
                            'rgb' => '123B54'
                        ]
                    ],
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                        'size' => 11
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ]
                ]);

                $sheet->getRowDimension(7)->setRowHeight(30);

                // ISI TABEL
                if ($lastRow >= 8) {

                    $sheet->getStyle("A8:D{$lastRow}")
                        ->applyFromArray([
                            'font' => [
                                'size' => 10,
                                'color' => ['rgb' => '25364B']
                            ],
                            'alignment' => [
                                'vertical' => 'center'
                            ],
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => 'thin',
                                    'color' => ['rgb' => 'E1E8EF']
                                ]
                            ]
                        ]);

                    for ($row = 8; $row <= $lastRow; $row++) {

                        if ($row % 2 == 0) {
                            $sheet->getStyle("A{$row}:D{$row}")
                                ->applyFromArray([
                                    'fill' => [
                                        'fillType' => 'solid',
                                        'startColor' => [
                                            'rgb' => 'F1F7FA'
                                        ]
                                    ]
                                ]);
                        }

                        $sheet->getRowDimension($row)->setRowHeight(23);
                    }

                    $sheet->getStyle("A8:A{$lastRow}")
                        ->getAlignment()
                        ->setHorizontal('center');

                    $sheet->getStyle("D8:D{$lastRow}")
                        ->getAlignment()
                        ->setHorizontal('center');
                }

                // FOOTER
                $footerRow = $lastRow + 2;

                $sheet->mergeCells(
                    "A{$footerRow}:D{$footerRow}"
                );

                $sheet->setCellValue(
                    "A{$footerRow}",
                    'Laporan dicetak pada: ' . now()->format('d-m-Y H:i')
                );

                $sheet->getStyle(
                    "A{$footerRow}:D{$footerRow}"
                )->applyFromArray([
                    'font' => [
                        'italic' => true,
                        'size' => 9,
                        'color' => ['rgb' => '8995A7']
                    ]
                ]);

                // PENGATURAN CETAK
                $sheet->freezePane('A8');
                $sheet->setAutoFilter("A7:D{$lastRow}");

                $sheet->getPageSetup()
                    ->setOrientation(
                        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE
                    );

                $sheet->getPageSetup()
                    ->setPaperSize(
                        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4
                    );

                $sheet->getPageSetup()->setFitToWidth(1);
                $sheet->getPageSetup()->setFitToHeight(0);
                $sheet->getPageSetup()->setFitToPage(true);

                $sheet->getPageMargins()->setTop(0.5);
                $sheet->getPageMargins()->setBottom(0.5);
                $sheet->getPageMargins()->setLeft(0.3);
                $sheet->getPageMargins()->setRight(0.3);

                $sheet->getPageSetup()->setPrintArea(
                    "A1:D{$footerRow}"
                );
            }
        ];
    }
}