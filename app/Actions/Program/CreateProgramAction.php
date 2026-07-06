<?php

declare(strict_types=1);

namespace App\Actions\Program;

use App\Data\Program\ProgramData;
use App\Models\Program;

class CreateProgramAction
{
    public function handle(ProgramData $data): Program
    {
        $order = Program::query()->max('order');

        return Program::query()->create([
            'slug' => $data->slug,
            'icon' => $data->icon,
            'image' => $data->image,
            'duration_years' => $data->duration_years,
            'degree_type' => $data->degree_type,
            'quota' => $data->quota,
            'name' => $data->name,
            'short_description' => $data->short_description,
            'full_description' => $data->full_description,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
