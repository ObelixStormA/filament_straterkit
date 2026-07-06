<?php

declare(strict_types=1);

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/partners'),

                TextInput::make('website_url')
                    ->url()
                    ->maxLength(255),

                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
