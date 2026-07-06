<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AdmissionDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AdmissionDocument>
 */
class AdmissionDocumentFactory extends Factory
{
    protected $model = AdmissionDocument::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_template_url' => null,
            'name' => ['uz' => fake()->words(3, true)],
            'order' => 0,
            'is_active' => true,
        ];
    }
}
