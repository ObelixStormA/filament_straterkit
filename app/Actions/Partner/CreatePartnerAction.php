<?php

declare(strict_types=1);

namespace App\Actions\Partner;

use App\Data\Partner\PartnerData;
use App\Models\Partner;

class CreatePartnerAction
{
    public function handle(PartnerData $data): Partner
    {
        $order = Partner::query()->max('order');

        return Partner::query()->create([
            'name' => $data->name,
            'logo' => $data->logo,
            'website_url' => $data->website_url,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
