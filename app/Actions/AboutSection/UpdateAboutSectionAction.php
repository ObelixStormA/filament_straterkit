<?php

declare(strict_types=1);

namespace App\Actions\AboutSection;

use App\Data\AboutSection\AboutSectionData;
use App\Models\AboutSection;

class UpdateAboutSectionAction
{
    public function handle(AboutSectionData $data): AboutSection
    {
        $aboutSection = AboutSection::current();

        $aboutSection->update([
            'image' => $data->image,
            'title_html' => $data->title_html,
            'description' => $data->description,
            'button_text' => $data->button_text,
        ]);

        return $aboutSection;
    }
}
