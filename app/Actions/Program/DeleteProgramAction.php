<?php

declare(strict_types=1);

namespace App\Actions\Program;

use App\Models\Program;

class DeleteProgramAction
{
    public function handle(Program $program): void
    {
        $program->delete();
    }
}
