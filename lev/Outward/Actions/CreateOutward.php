<?php

namespace Lev\Outward\Actions;

use Illuminate\Support\Facades\DB;
use Lev\Outward\Models\Outward;
use Lev\Stock\Actions\CreateStockMoveLog;
use Lev\Stock\Actions\DecreaseStock;

class CreateOutward
{
    public function __invoke(array $validated): void
    {
        DB::transaction(function () use ($validated) {

            $outward = Outward::query()->create([
                'outward_date' => $validated['outward_date'],
                'partner_id' => $validated['partner_id'],
                'payment_type' => $validated['payment_type'],
                'comment' => $validated['comment'],
            ]);

            $outward->forceFill(['document_number' => '2023/KIV-' . $outward->id])->save();

            foreach ($validated['items'] as $item) {
                $outward->items()->create([
                    'product_id' => $item['product_id'],
                    'net_price' => $item['net_price'],
                    'quantity' => $item['quantity'],
                ]);
            }

            $decreaseStock = new DecreaseStock;
            $createStockMoveLog = new CreateStockMoveLog;

            $outward->items()->each(function ($item) use ($createStockMoveLog, $decreaseStock, $outward) {
                $stock = ($decreaseStock)(
                    product: $item->product,
                    quantity: $item->quantity
                );

                ($createStockMoveLog)(
                    eventable: $outward,
                    product: $item->product,
                    quantity: $item->quantity,
                    updatedQuantity: $stock->quantity
                );
            });
        });
    }
}
