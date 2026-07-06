<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Actions\AboutSection\UpdateAboutSectionAction;
use App\Data\AboutSection\AboutSectionData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Models\AboutSection;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageAboutSection extends Page implements HasForms
{
    use InteractsWithForms;
    use TransformsTranslatableFields;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInformationCircle;

    protected static string|UnitEnum|null $navigationGroup = 'Homepage';

    protected string $view = 'filament.pages.singleton-form';

    /**
     * @var array<string, mixed>
     */
    public array $data = [];

    public static function canAccess(): bool
    {
        return auth()->user()?->can('about-section.update') ?? false;
    }

    public function mount(): void
    {
        $aboutSection = AboutSection::current();

        $data = $this->unpackTranslatable(
            $aboutSection->only(['image']),
            $aboutSection,
            ['title_html', 'description', 'button_text'],
        );

        $this->form->fill($data);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/about-section'),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('title_html_uz')->label('Title (HTML allowed)')->maxLength(500),
                            Textarea::make('description_uz')->label('Description'),
                            TextInput::make('button_text_uz')->label('Button text')->maxLength(100),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('title_html_ru')->label('Title (HTML allowed)')->maxLength(500),
                            Textarea::make('description_ru')->label('Description'),
                            TextInput::make('button_text_ru')->label('Button text')->maxLength(100),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('title_html_en')->label('Title (HTML allowed)')->maxLength(500),
                            Textarea::make('description_en')->label('Description'),
                            TextInput::make('button_text_en')->label('Button text')->maxLength(100),
                        ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->packTranslatable($this->form->getState(), ['title_html', 'description', 'button_text']);

        app(UpdateAboutSectionAction::class)->handle(AboutSectionData::from($data));

        Notification::make()->title('Saved')->success()->send();
    }
}
