<?php

namespace Lev\Product\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Lev\Product\Actions\CreateProduct;
use Lev\Product\Actions\UpdateProduct;
use Lev\Product\Models\Product;
use Lev\Product\Requests\CreateProductRequest;
use Lev\Product\Requests\UpdateProductRequest;
use Lev\Product\Resources\ProductResource;
use Lev\Stock\Resources\StockLogResource;

class ProductController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Product/Index', [
            'products' => ProductResource::collection(
                Product::query()
                    ->search(request('search'))
                    ->paginate(20)
                    ->withQueryString()),
            'filters' => [
                'search' => request('search')
            ],
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Product/Create');
    }

    public function store(CreateProduct $createProduct, CreateProductRequest $request): RedirectResponse
    {
        $createProduct($request->validated());

        return to_route('admin.products.index');
    }

    public function edit(Product $product): Response
    {
        return Inertia::render('Product/Edit', [
            'product' => new ProductResource($product),
            'stock' => $product->stock->quantity ?? 0,
            'stockLogs' => StockLogResource::collection($product->stockLogs)
        ]);
    }

    public function update(Product $product, UpdateProduct $updateProduct, UpdateProductRequest $request): void
    {
        $updateProduct($product, $request->validated());
    }

    public function destroy(Product $product): void
    {
        $product->delete();
    }
}
