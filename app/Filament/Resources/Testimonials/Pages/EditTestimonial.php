<?php

declare(strict_types=1);

namespace App\Filament\Resources\Testimonials\Pages;

use App\Actions\Testimonial\DeleteTestimonialAction;
use App\Actions\Testimonial\UpdateTestimonialAction;
use App\Data\Testimonial\TestimonialData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Testimonials\TestimonialResource;
use App\Models\Testimonial;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditTestimonial extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = TestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (Testimonial $record) => app(DeleteTestimonialAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['display_name', 'quote_text']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): Testimonial
    {
        $data = $this->packTranslatable($data, ['display_name', 'quote_text']);

        return app(UpdateTestimonialAction::class)->handle($record, TestimonialData::from($data));
    }
}
