<?php

namespace Lev\Inward\Actions;

use Illuminate\Support\Arr;
use Lev\Inward\Models\Inward;

class UpdateInward
{
    public function __invoke(Inward $inward, array $validated): void
    {
        $inward->query()->update([
            'inward_date' => $validated['inward_date'],
            'partner_id' => $validated['partner_id'],
            'payment_type' => $validated['payment_type'],
            'comment' => $validated['comment'],
        ]);

        foreach ($validated['items'] as $item) {
            $inward
                ->items()
                ->where('id', $item['id'])
                ->update([
                    'net_price' => $item['net_price']
                ]);
        }
    }
}
