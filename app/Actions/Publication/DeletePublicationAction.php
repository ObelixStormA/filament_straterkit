<?php

declare(strict_types=1);

namespace App\Actions\Publication;

use App\Models\Publication;

class DeletePublicationAction
{
    public function handle(Publication $publication): void
    {
        $publication->delete();
    }
}
