<?php

namespace Lev\Inward\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Lev\Inward\Actions\CreateInward;
use Lev\Inward\Actions\UpdateInward;
use Lev\Inward\Enums\PaymentType;
use Lev\Inward\Models\Inward;
use Lev\Inward\Requests\CreateInwardRequest;
use Lev\Inward\Requests\UpdateInwardRequest;
use Lev\Inward\Resources\InwardEditResource;
use Lev\Inward\Resources\InwardIndexResource;
use Lev\Product\Models\Product;

class InwardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Inward/Index', [
            'inwards' => InwardIndexResource::collection(
                Inward::query()
                    ->search(request('search'))
                    ->paginate(10)
                    ->withQueryString()
            ),
            'filters' => [
                'search' => request('search')
            ]
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Inward/Create', [
            'products' => Product::query()->select('id', 'name')->get(),
            'paymentTypes' => PaymentType::items(),
        ]);
    }

    public function store(CreateInward $createInward, CreateInwardRequest $createInwardRequest): RedirectResponse
    {
        $createInward($createInwardRequest->validated());

        return to_route('admin.inwards.index');
    }

    public function edit(Inward $inward): Response
    {
        return Inertia::render('Inward/Edit', [
            'inward' => new InwardEditResource($inward),
            'products' => Product::query()->select('id', 'name')->get(),
            'paymentTypes' => PaymentType::items(),
        ]);
    }

    public function update(Inward $inward, UpdateInward $updateInward, UpdateInwardRequest $updateInwardRequest)
    {
        $updateInward($inward, $updateInwardRequest->validated());
    }
}
