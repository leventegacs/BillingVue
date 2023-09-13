<?php

namespace Lev\Outward\Controllers;

use App\Enums\StockMoveStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Lev\Outward\Models\Outward;

class OutwardCloseController extends Controller
{
    public function __invoke(Outward $outward): RedirectResponse
    {
        $outward->forceFill([
           'status' => StockMoveStatus::CLOSED
        ])->save();

        return to_route('admin.outwards.show', $outward->id);
    }
}
