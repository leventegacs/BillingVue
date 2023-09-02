<?php

namespace Lev\Partner\Actions;

use Lev\Partner\Models\Partner;

class UpdatePartner
{
    public function __invoke(Partner $partner, array $validated): Partner
    {
        $partner->forceFill($validated)->save();

        $partner->fresh();

        return $partner;
    }
}
