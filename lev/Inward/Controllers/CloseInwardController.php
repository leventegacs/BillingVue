<?php

namespace Lev\Inward\Controllers;

use App\Enums\StockMoveStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Lev\Inward\Models\Inward;

class CloseInwardController extends Controller
{
    public function __invoke(Inward $inward): RedirectResponse
    {
        $inward->forceFill([
            'status' => StockMoveStatus::CLOSED
        ])->save();

        return to_route('admin.inwards.show', $inward->id);
    }
}
