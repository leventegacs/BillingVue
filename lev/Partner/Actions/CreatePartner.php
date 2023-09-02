<?php

namespace Lev\Partner\Actions;

use Lev\Partner\Models\Partner;

class CreatePartner
{
    public function __invoke(array $validated): Partner
    {
        return Partner::query()->create($validated);
    }
}
