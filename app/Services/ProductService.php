<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\UploadedFile;

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
            'path' => 'img/' . $uploadedFile->getClientOriginalName()
        ]);

        $uploadedFile->move(public_path() .  '/img/', $uploadedFile->getClientOriginalName());
//        Storage::put('/products', $uploadedFile);

        return $productImage;
    }
}
