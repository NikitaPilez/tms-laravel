<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory()
            ->count(1)
            ->create();

        $tags = Tag::all();

        $products->each(function ($product) use ($tags) {
           $product->tags()->saveMany($tags->random(rand(1, 5)));
        });
    }
}
