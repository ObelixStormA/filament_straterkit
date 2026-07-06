<?php

declare(strict_types=1);

namespace App\Actions\StatNumber;

use App\Models\StatNumber;

class DeleteStatNumberAction
{
    public function handle(StatNumber $statNumber): void
    {
        $statNumber->delete();
    }
}
