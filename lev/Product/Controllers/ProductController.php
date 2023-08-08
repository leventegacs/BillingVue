<?php

namespace Lev\Product\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Lev\Product\Models\Product;

class ProductController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Product/Index', [
            'products' => Product::query()
                ->when(request('search'), function($query) {
                    $query->where('name', 'like', '%'.request('search').'%');
                })
                ->paginate(20)
                ->withQueryString(),
            'filters' => ['search' => request('search')],
        ]);
    }
}
