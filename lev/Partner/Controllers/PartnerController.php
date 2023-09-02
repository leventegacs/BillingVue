<?php

namespace Lev\Partner\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Lev\Partner\Actions\CreatePartner;
use Lev\Partner\Actions\UpdatePartner;
use Lev\Partner\Models\Partner;
use Lev\Partner\Requests\CreatePartnerRequest;
use Lev\Partner\Requests\UpdatePartnerRequest;
use Lev\Partner\Resources\PartnerFormResource;
use Lev\Partner\Resources\PartnerResource;

class PartnerController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Partner/Index', [
            'partners' => PartnerResource::collection(
                Partner::query()
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
        return Inertia::render('Partner/Create');
    }

    public function store(CreatePartnerRequest $request, CreatePartner $createPartner): RedirectResponse
    {
        $createPartner($request->validated());

        return to_route('admin.partners.index');
    }

    public function edit(Partner $partner): Response
    {
        return Inertia::render('Partner/Edit', [
           'partner' => new PartnerFormResource($partner)
        ]);
    }

    public function update(Partner $partner, UpdatePartnerRequest $request, UpdatePartner $updatePartner): RedirectResponse
    {
        $updatePartner($partner, $request->validated());

        return back(303);
    }
}
