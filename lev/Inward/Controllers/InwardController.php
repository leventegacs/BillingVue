<?php

namespace Lev\Inward\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class InwardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Inward/Index');
    }
}
