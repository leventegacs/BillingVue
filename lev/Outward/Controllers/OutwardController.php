<?php

namespace Lev\Outward\Controllers;

use App\Enums\PaymentType;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Lev\Outward\Actions\CreateOutward;
use Lev\Outward\Actions\UpdateOutward;
use Lev\Outward\Models\Outward;
use Lev\Outward\Requests\CreateOutwardRequest;
use Lev\Outward\Requests\UpdateOutwardRequest;
use Lev\Outward\Resources\OutwardFormResource;
use Lev\Outward\Resources\OutwardResource;
use Lev\Outward\Resources\OutwardShowResource;
use Lev\Partner\Models\Partner;
use Lev\Product\Models\Product;
use Lev\Stock\Exceptions\ProductShortage;

class OutwardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Outward/Index', [
            'outwards' => OutwardResource::collection(
                Outward::query()
                    ->search(request('search'))
                    ->paginate(20)
                    ->withQueryString()
            ),
            'filters' => [
                'search' => request('search')
            ]
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Outward/Create', [
            'paymentTypes' => PaymentType::items(),
            'partners' => Partner::query()->select('id', 'name')->get(),
            'products' => Product::query()
                ->whereHas('stock', fn($query) => $query->where('quantity', '>', 0))
                ->select('id', 'name')
                ->get(),
        ]);
    }

    public function store(CreateOutwardRequest $request, CreateOutward $createOutward): RedirectResponse
    {
        $createOutward($request->validated());

        return to_route('admin.outwards.index');
    }

    public function edit(Outward $outward): Response
    {
        return Inertia::render('Outward/Edit', [
            'outward' => new OutwardFormResource($outward),
            'paymentTypes' => PaymentType::items(),
            'partners' => Partner::query()->select('id', 'name')->get(),
        ]);
    }

    public function update(Outward $outward, UpdateOutwardRequest $request, UpdateOutward $updateOutward): RedirectResponse
    {
        $updateOutward($outward, $request->validated());

        return back(303);
    }

    public function show(Outward $outward): Response
    {
        return Inertia::render('Outward/Show', [
            'outward' => new OutwardShowResource($outward),
        ]);
    }
}
