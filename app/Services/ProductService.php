<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getProducts(array $params)
    {
        $products = Product::query();

        $products = match ($params['sort'] ?? null) {
            'rating' => $products->withAvg('reviews', 'star_count')->groupBy('id')->orderBy('reviews_avg_star_count', 'DESC'),
            'price-asc' => $products->orderBy('price'),
            'price-desc' => $products->orderBy('price', 'DESC'),
            default => $products->orderBy('created_at', 'DESC')
        };

        return $products->where('is_active', 1)->get();
    }
}
