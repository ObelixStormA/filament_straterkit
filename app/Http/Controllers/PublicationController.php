<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\View\View;

class PublicationController extends Controller
{
    public function journals(): View
    {
        $publications = Publication::query()->published()->journals()->paginate(6);

        return view('publications.journals', compact('publications'));
    }

    public function collections(): View
    {
        $publications = Publication::query()->published()->collections()->paginate(6);

        return view('publications.collections', compact('publications'));
    }
}
