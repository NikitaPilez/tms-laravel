<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ExcelService;
use App\Services\ProductService;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    private ProductService $productService;
    private ExcelService $excelService;

    public function __construct(ProductService $productService, ExcelService $excelService)
    {
        $this->productService = $productService;
        parent::__construct();
        $this->excelService = $excelService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->with(['category'])->orderByDesc('created_at')->paginate(15);

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
    public function store(CreateProductRequest $request)
    {
        $validated = $request->validated();
        $product = Product::query()->create($validated);

        if ($request->has('files')) {
            /** @var UploadedFile $file */
            foreach ($request->file('files') as $file) {
                $productImage = $this->productService->createProductImage($file);
                $product->images()->save($productImage);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product has been successfully created');
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

        return redirect()->back()->with('success', 'Product has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product has been successfully deleted');
    }

    public function exportCsv()
    {
        $this->excelService->exportProductToCsv(Product::all());
    }

    public function exportExcel()
    {
        $this->excelService->exportProductsToExcel(Product::all());
    }

    public function uploadExcel()
    {
        $this->excelService->importProductsFromExcel();
    }
}
