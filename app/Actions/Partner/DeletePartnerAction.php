<?php

declare(strict_types=1);

namespace App\Actions\Partner;

use App\Models\Partner;

class DeletePartnerAction
{
    public function handle(Partner $partner): void
    {
        $partner->delete();
    }
}
