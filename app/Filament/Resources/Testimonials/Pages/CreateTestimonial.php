<?php

declare(strict_types=1);

namespace App\Filament\Resources\Testimonials\Pages;

use App\Actions\Testimonial\CreateTestimonialAction;
use App\Data\Testimonial\TestimonialData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Testimonials\TestimonialResource;
use App\Models\Testimonial;
use Filament\Resources\Pages\CreateRecord;

class CreateTestimonial extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = TestimonialResource::class;

    protected function handleRecordCreation(array $data): Testimonial
    {
        $data = $this->packTranslatable($data, ['display_name', 'quote_text']);

        return app(CreateTestimonialAction::class)->handle(TestimonialData::from($data));
    }
}
