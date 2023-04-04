<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelService
{
    public function exportProductsToExcel(Collection $products)
    {
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $this->prepareProductsExcelData($activeWorksheet, $products);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=data.xlsx');
        $writer->save('php://output');
        exit;
    }
    private function prepareProductsExcelData(Worksheet $activeWorksheet, Collection $products)
    {
        $columns = ['ID', 'Title', 'Short description', 'Price', 'Sale price', 'Description', 'Category name', 'Status', 'Created at'];
        for ($i = 0; $i < count($columns); $i++) {
            $activeWorksheet->setCellValue(chr(65 + $i) . '1', $columns[$i]);
        }

        foreach ($products as $key => $product) {
            $index = $key + 2;
            $activeWorksheet->setCellValue('A' .  $index, $product->id);
            $activeWorksheet->setCellValue('B' .  $index, $product->title);
            $activeWorksheet->setCellValue('C' .  $index, $product->short_description);
            $activeWorksheet->setCellValue('D' .  $index, $product->price);
            $activeWorksheet->setCellValue('E' .  $index, $product->sale_price);
            $activeWorksheet->setCellValue('F' .  $index, $product->description);
            $activeWorksheet->setCellValue('G' .  $index, $product->category?->name);
            $activeWorksheet->setCellValue('H' .  $index, $product->is_active ? 'Активен' : 'Не активен');
            $activeWorksheet->setCellValue('I' .  $index, $product->created_at);
        }
    }
}
