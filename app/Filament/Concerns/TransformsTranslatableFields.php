<?php

declare(strict_types=1);

namespace App\Filament\Concerns;

use Illuminate\Database\Eloquent\Model;

trait TransformsTranslatableFields
{
    /**
     * Collapses flat `{field}_uz`/`{field}_ru`/`{field}_en` form inputs into the
     * `['uz' => ..., 'ru' => ..., 'en' => ...]` array shape the *Data DTOs expect.
     *
     * @param  array<string, mixed>  $data
     * @param  list<string>  $fields
     * @return array<string, mixed>
     */
    protected function packTranslatable(array $data, array $fields): array
    {
        foreach ($fields as $field) {
            $data[$field] = [
                'uz' => $data["{$field}_uz"] ?? null,
                'ru' => $data["{$field}_ru"] ?? null,
                'en' => $data["{$field}_en"] ?? null,
            ];

            unset($data["{$field}_uz"], $data["{$field}_ru"], $data["{$field}_en"]);
        }

        return $data;
    }

    /**
     * Expands a translatable model's stored translations into flat `{field}_{locale}`
     * keys so the per-language form inputs can be filled when editing.
     *
     * @param  array<string, mixed>  $data
     * @param  list<string>  $fields
     * @return array<string, mixed>
     */
    protected function unpackTranslatable(array $data, Model $record, array $fields): array
    {
        foreach ($fields as $field) {
            $translations = $record->getTranslations($field);

            foreach (['uz', 'ru', 'en'] as $locale) {
                $data["{$field}_{$locale}"] = $translations[$locale] ?? null;
            }

            unset($data[$field]);
        }

        return $data;
    }
}
