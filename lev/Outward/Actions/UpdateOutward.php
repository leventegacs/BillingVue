<?php

namespace Lev\Outward\Actions;


use Lev\Outward\Models\Outward;

class UpdateOutward
{
    public function __invoke(Outward $outward, array $validated): void
    {
        $outward->query()->update([
            'outward_date' => $validated['outward_date'],
            'partner_id' => $validated['partner_id'],
            'payment_type' => $validated['payment_type'],
            'comment' => $validated['comment'],
        ]);

        foreach ($validated['items'] as $item) {
            $outward
                ->items()
                ->where('id', $item['id'])
                ->update([
                    'net_price' => $item['net_price']
                ]);
        }
    }
}
