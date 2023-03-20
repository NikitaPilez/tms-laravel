<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getProducts(array $params)
    {
        $products = Product::query();

        $products = match ($params['sort'] ?? null) {
            'rating' => $products,
            'price-asc' => $products->orderBy('price'),
            'price-desc' => $products->orderBy('price', 'DESC'),
            default => $products->orderBy('created_at', 'DESC')
        };

        $products = $products->where('is_active', 1)->get();

        return $products;
    }
}
