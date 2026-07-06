<?php

declare(strict_types=1);

namespace App\Actions\Publication;

use App\Data\Publication\PublicationData;
use App\Models\Publication;

class UpdatePublicationAction
{
    public function handle(Publication $publication, PublicationData $data): Publication
    {
        $publication->update([
            'type' => $data->type,
            'cover_image' => $data->cover_image,
            'year' => $data->year,
            'issue_number' => $data->issue_number,
            'event_type' => $data->event_type,
            'code_type' => $data->code_type,
            'code_value' => $data->code_value,
            'file_url' => $data->file_url,
            'title' => $data->title,
            'description' => $data->description,
            'is_published' => $data->is_published,
        ]);

        return $publication;
    }
}
