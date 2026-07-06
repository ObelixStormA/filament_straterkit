<?php

declare(strict_types=1);

namespace App\Actions\Testimonial;

use App\Models\Testimonial;

class DeleteTestimonialAction
{
    public function handle(Testimonial $testimonial): void
    {
        $testimonial->delete();
    }
}
