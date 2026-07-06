<?php

declare(strict_types=1);

namespace App\Actions\Lab;

use App\Models\Lab;

class DeleteLabAction
{
    public function handle(Lab $lab): void
    {
        $lab->delete();
    }
}
