<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProductService
{
    public function getProducts(array $params)
    {
        $products = Product::query()->with(['reviews', 'category'])->where('is_active', 1);

        $products = match ($params['sort'] ?? null) {
            'rating' => $products->withAvg('reviews', 'star_count')->groupBy('id')->orderByDesc('reviews_avg_star_count'),
            'price-asc' => $products->orderBy('price'),
            'price-desc' => $products->orderByDesc('price'),
            default => $products->orderByDesc('created_at')
        };

        if (isset($params['price-min'])) {
            $products->where('price', '>', $params['price-min']);
        }

        if (isset($params['price-max'])) {
            $products->where('price', '<', $params['price-max']);
        }

        return $products->paginate(12);
    }

    public function createProductImage(UploadedFile $uploadedFile)
    {
        $productImage = ProductImage::query()->create([
            'name' => $uploadedFile->getClientOriginalName(),
            'type' => $uploadedFile->getClientOriginalExtension(),
            'mimetype' => $uploadedFile->getMimeType(),
            'size' => $uploadedFile->getSize(),
            'path' => 'img/products/' . $uploadedFile->getClientOriginalName()
        ]);

        $uploadedFile->move(public_path() .  '/img/', $uploadedFile->getClientOriginalName());
//        Storage::put('/products', $uploadedFile);

        return $productImage;
    }

    public function downloadCsv(Collection $products)
    {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=products.csv');

        $f = fopen('php://output', 'w');
        fputcsv($f, ['Title', 'Short description', 'Price', 'Sale price', 'Description', 'Category name', 'Status', 'Created at'], ';');

        foreach ($products as $product) {
            $data = [
                $product->title,
                $product->short_description,
                $product->price,
                $product->sale_price,
                $product->description,
                $product->category?->name,
                $product->is_active == 1 ? 'Активен' : 'Не активен',
                $product->created_at
            ];
            fputcsv($f, $data, ';');
        }
        exit;
    }

    public function downloadExcel(Collection $products)
    {
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $this->prepareExcelData($activeWorksheet, $products);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=products.xlsx');
        $writer->save('php://output');
        exit;
    }

    private function prepareExcelData(Worksheet $activeWorksheet, Collection $products)
    {
        $columns = ['Title', 'Short description', 'Price', 'Sale price', 'Description', 'Category name', 'Status', 'Created at'];
        for ($i = 0; $i < count($columns); $i++) {
            $activeWorksheet->setCellValue(chr(65 + $i) . '1', $columns[$i]);
        }

        foreach ($products as $key => $product) {
            $index = $key + 2;
            $activeWorksheet->setCellValue('A' .  $index, $product->title);
            $activeWorksheet->setCellValue('B' .  $index, $product->short_description);
            $activeWorksheet->setCellValue('C' .  $index, $product->price);
            $activeWorksheet->setCellValue('D' .  $index, $product->sale_price);
            $activeWorksheet->setCellValue('E' .  $index, $product->description);
            $activeWorksheet->setCellValue('F' .  $index, $product->category?->name);
            $activeWorksheet->setCellValue('G' .  $index, $product->status);
            $activeWorksheet->setCellValue('H' .  $index, $product->created_at);
        }
    }
}
