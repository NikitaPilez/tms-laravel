<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateProductRequest;
use App\Http\Requests\API\UpdateProductRequest;
use App\Http\Requests\GetProductsRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
        parent::__construct();
    }

    public function index(GetProductsRequest $request)
    {
        return new ProductCollection($this->productService->getProducts($request->validated()));
    }

    public function get(Product $product)
    {
        return new ProductResource($product);
    }

    public function create(CreateProductRequest $request)
    {
        return new ProductResource(Product::query()->create($request->validated()));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return new ProductResource($product);
    }

    public function delete(Product $product)
    {
        $product->delete();
        return response()->json(['success' => 'true']);
    }

    public function getLatestProducts()
    {
        return new ProductCollection(Product::query()->latestActive(3)->get());
    }
}
