<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->orderByDesc('created_at')->paginate(15);

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::query()->where('is_active', 1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request, ProductService $fileService)
    {
        $validated = $request->validated();
        $product = Product::query()->create($validated);

        if ($request->has('files')) {
            /** @var UploadedFile $file */
            foreach ($request->file('files') as $file) {
                $productImage = $fileService->createProductImage($file);
                $product->images()->save($productImage);
            }
        }

        session()->flash('success', 'Product has been successfully created');

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.update', [
            'product' => $product,
            'categories' => Category::query()->where('is_active', 1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        session()->flash('success', 'Product has been successfully updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        session()->flash('success', 'Product has been successfully deleted');

        return back();
    }
}
