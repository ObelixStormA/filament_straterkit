<?php

declare(strict_types=1);

namespace App\Actions\Testimonial;

use App\Data\Testimonial\TestimonialData;
use App\Models\Testimonial;

class CreateTestimonialAction
{
    public function handle(TestimonialData $data): Testimonial
    {
        $order = Testimonial::query()->max('order');

        return Testimonial::query()->create([
            'photo' => $data->photo,
            'person_type' => $data->person_type,
            'rating' => $data->rating,
            'display_name' => $data->display_name,
            'quote_text' => $data->quote_text,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
