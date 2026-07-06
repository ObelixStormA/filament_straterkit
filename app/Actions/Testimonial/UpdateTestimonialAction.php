<?php

declare(strict_types=1);

namespace App\Actions\Testimonial;

use App\Data\Testimonial\TestimonialData;
use App\Models\Testimonial;

class UpdateTestimonialAction
{
    public function handle(Testimonial $testimonial, TestimonialData $data): Testimonial
    {
        $testimonial->update([
            'photo' => $data->photo,
            'person_type' => $data->person_type,
            'rating' => $data->rating,
            'display_name' => $data->display_name,
            'quote_text' => $data->quote_text,
            'is_active' => $data->is_active,
        ]);

        return $testimonial;
    }
}
