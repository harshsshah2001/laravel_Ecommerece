<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class UsersExport implements FromCollection, WithHeadings, WithEvents, WithColumnFormatting
{
    /**
     * Fetch customer data including image path.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('customers')
            ->select('name', 'email', 'city', 'phone', 'image') // Fetch image column
            ->get();
    }

    /**
     * Define Excel headings.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'City',
            'Phone',
            'image', // Column for displaying actual images
        ];
    }

    /**
     * Register events for styling and adding images.
     *
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Styling for the heading row
                $sheet->getStyle('A1:E1')->getFont()->setSize(14)->setBold(true);
                $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A1:E1')->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFADD8E6'); // Light blue background
                $sheet->getStyle('A1:E1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THICK);

                // Styling for data rows (alignment & borders)
                $lastRow = $sheet->getHighestRow();
                $sheet->getStyle('A2:E' . $lastRow)
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A2:E' . $lastRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THICK);

                // Set column width
                $sheet->getColumnDimension('A')->setWidth(20);
                $sheet->getColumnDimension('B')->setWidth(25);
                $sheet->getColumnDimension('C')->setWidth(20);
                $sheet->getColumnDimension('D')->setWidth(15);
                $sheet->getColumnDimension('E')->setWidth(30); // Adjust width for image column

                // Fetch user data including images and insert into Excel
                $users = DB::table('customers')->select('name', 'email', 'city', 'phone', 'image')->get();
                $row = 2; // Start from the second row

                foreach ($users as $user) {
                    // Insert user data into respective columns
                    $sheet->setCellValue('A' . $row, $user->name);
                    $sheet->setCellValue('B' . $row, $user->email);
                    $sheet->setCellValue('C' . $row, $user->city);
                    $sheet->setCellValue('D' . $row, $user->phone);

                    // Fetch user images and insert into Excel
                    if (!empty($user->image) && file_exists(public_path('images/' . $user->image))) {
                        // Create a new Drawing object to insert the image
                        $drawing = new Drawing();
                        $drawing->setPath(public_path('images/' . $user->image)); // Path to image
                        $drawing->setHeight(80); // Adjust image height as needed
                        $drawing->setWidth(80); // Adjust image width as needed
                        $drawing->setCoordinates('E' . $row); // Place in column E
                        $drawing->setOffsetX(5); // Slight offset for better alignment
                        $drawing->setOffsetY(5);
                        $drawing->setWorksheet($sheet); // Add drawing to the worksheet
                    }
                    $row++;
                }
            },
        ];
    }

    /**
     * Format columns.
     *
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_TEXT,  // Phone as text
        ];
    }
}
