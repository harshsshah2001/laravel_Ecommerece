<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class UsersExport implements FromCollection, WithHeadings, WithEvents, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('customers')
            ->select('name', 'email', 'city', 'phone')
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'name',
            'email',
            'city',
            'phone',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // 1. Styling for the heading row
                $sheet->getStyle('A1:D1') // Apply to entire heading row A1 to D1
                    ->getFont()
                    ->setSize(16)
                    ->setBold(true);

                $sheet->getStyle('A1:D1') //Apply to entire heading row A1 to D1
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

               $sheet->getStyle('A1:D1')->getFill()  // Apply to entire heading row
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFADD8E6'); // Light blue background

            $sheet->getStyle('A1:D1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK); // Thick Border

                // 2. Styling for the data rows (borders and alignment)
                $lastRow = $sheet->getHighestRow();
                $sheet->getStyle('A2:D' . $lastRow) // Apply to all data rows from row 2
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle('A2:D' . $lastRow)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK); //Thick Border
                //Set column width
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(25);
            },
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_TEXT,  // Column D (phone) as text
        ];
    }
}
