<?php

namespace Lev\Inward\Actions;

use Lev\Inward\Events\CreatedInwardEvent;
use Lev\Inward\Models\Inward;

class CreateInward
{
    public function __invoke(array $validated): void
    {
        $inward = Inward::query()->create([
            'inward_date' => $validated['inward_date'],
            'partner_id' => $validated['partner_id'],
            'payment_type' => $validated['payment_type'],
            'comment' => $validated['comment'],
        ]);

        $inward->forceFill(['document_number' => '2023/BEV-'.$inward->id])->save();

        foreach($validated['items'] as $item) {
            $inward->items()->create([
                'product_id' => $item['product_id'],
                'net_price' => $item['net_price'],
                'quantity' => $item['quantity'],
            ]);
        }

        CreatedInwardEvent::dispatch($inward);
    }
}
