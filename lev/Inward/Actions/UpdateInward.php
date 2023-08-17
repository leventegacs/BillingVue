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
            'partner' => $validated['partner'],
            'payment_type' => $validated['payment_type'],
            'comment' => $validated['comment'],
        ]);
        //dd(Arr::pluck($validated['items'], 'id'));
        $inward->items
            ->whereNotIn('id', Arr::pluck($validated['items'], 'id'))
            ->each
            ->delete();

        foreach ($validated['items'] as $item) {
            $inward->items()->updateOrCreate([
                'id' => $item['id']
            ],
                [
                    'product_id' => $item['product_id'],
                    'net_price' => $item['net_price'],
                    'quantity' => $item['quantity'],
                ]);
        }
    }
}
