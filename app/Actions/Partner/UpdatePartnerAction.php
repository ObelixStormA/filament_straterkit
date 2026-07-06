<?php

declare(strict_types=1);

namespace App\Actions\Partner;

use App\Data\Partner\PartnerData;
use App\Models\Partner;

class UpdatePartnerAction
{
    public function handle(Partner $partner, PartnerData $data): Partner
    {
        $partner->update([
            'name' => $data->name,
            'logo' => $data->logo,
            'website_url' => $data->website_url,
            'is_active' => $data->is_active,
        ]);

        return $partner;
    }
}
