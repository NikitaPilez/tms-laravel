<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getProducts(array $params)
    {
        $products = Product::query();

        $products = match ($params['sort'] ?? null) {
            'rating' => $products->withAvg('reviews', 'star_count')->groupBy('id')->orderByDesc('reviews_avg_star_count'),
            'price-asc' => $products->orderBy('price'),
            'price-desc' => $products->orderByDesc('price'),
            default => $products->orderByDesc('created_at')
        };

        return $products->where('is_active', 1)->paginate(12);
    }
}