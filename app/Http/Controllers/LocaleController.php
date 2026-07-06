<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch(Request $request, string $locale): RedirectResponse
    {
        if (in_array($locale, SetLocale::SUPPORTED_LOCALES, true)) {
            $request->session()->put('locale', $locale);
        }

        /** @var string $previousUrl */
        $previousUrl = url()->previous(fallback: route('home'));

        return redirect($previousUrl);
    }
}
