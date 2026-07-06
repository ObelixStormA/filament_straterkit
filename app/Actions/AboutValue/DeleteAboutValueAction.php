<?php

declare(strict_types=1);

namespace App\Actions\AboutValue;

use App\Models\AboutValue;

class DeleteAboutValueAction
{
    public function handle(AboutValue $aboutValue): void
    {
        $aboutValue->delete();
    }
}
