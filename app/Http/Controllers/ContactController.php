<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\AdmissionApplication\StoreAdmissionApplicationAction;
use App\Actions\ContactMessage\StoreContactMessageAction;
use App\Data\AdmissionApplication\AdmissionApplicationData;
use App\Data\ContactMessage\ContactMessageData;
use App\Http\Requests\StoreAdmissionApplicationRequest;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact', [
            'programs' => Program::active()->get(),
        ]);
    }

    public function store(StoreContactMessageRequest $request, StoreContactMessageAction $action): RedirectResponse
    {
        $action->handle(ContactMessageData::from($request->validated()));

        return back()->with('status', "Xabaringiz yuborildi. Tez orada siz bilan bog'lanamiz.");
    }

    public function storeApplication(StoreAdmissionApplicationRequest $request, StoreAdmissionApplicationAction $action): RedirectResponse
    {
        $action->handle(AdmissionApplicationData::from($request->validated()));

        return back()->with('applicationStatus', 'Arizangiz qabul qilindi. Qabul komissiyasi siz bilan bog\'lanadi.');
    }
}
