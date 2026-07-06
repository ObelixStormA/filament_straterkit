<?php

declare(strict_types=1);

namespace App\Filament\Clusters\Settings\Pages;

use App\Actions\SiteSetting\UpdateSiteSettingAction;
use App\Data\SiteSetting\SiteSettingData;
use App\Filament\Clusters\Settings\SettingsCluster;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Models\SiteSetting;
use BackedEnum;
use Filament\Forms\Components\ColorPicker;
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

class ManageSiteSettings extends Page implements HasForms
{
    use InteractsWithForms;
    use TransformsTranslatableFields;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static ?string $cluster = SettingsCluster::class;

    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.singleton-form';

    /**
     * @var array<string, mixed>
     */
    public array $data = [];

    public static function canAccess(): bool
    {
        return auth()->user()?->can('site-setting.update') ?? false;
    }

    public function mount(): void
    {
        $siteSetting = SiteSetting::current();

        $data = $this->unpackTranslatable(
            $siteSetting->only([
                'phone_primary', 'phone_fax', 'email_primary', 'map_latitude', 'map_longitude',
                'map_embed_url', 'founding_year', 'theme_color_primary', 'theme_color_secondary',
                'theme_color_accent', 'font_heading', 'font_body', 'site_logo', 'site_favicon',
            ]),
            $siteSetting,
            ['site_name', 'site_short_name', 'address', 'footer_description', 'meta_description', 'meta_keywords'],
        );

        $this->form->fill($data);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('site_logo')
                    ->image()
                    ->disk('public')
                    ->directory('branding'),

                FileUpload::make('site_favicon')
                    ->image()
                    ->disk('public')
                    ->directory('branding'),

                TextInput::make('phone_primary')->maxLength(30),
                TextInput::make('phone_fax')->maxLength(30),
                TextInput::make('email_primary')->email()->maxLength(150),

                TextInput::make('map_latitude')->numeric(),
                TextInput::make('map_longitude')->numeric(),
                TextInput::make('map_embed_url')->maxLength(500),

                TextInput::make('founding_year')->numeric(),

                ColorPicker::make('theme_color_primary'),
                ColorPicker::make('theme_color_secondary'),
                ColorPicker::make('theme_color_accent'),

                TextInput::make('font_heading')->maxLength(100),
                TextInput::make('font_body')->maxLength(100),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make("O'zbek")->schema([
                            TextInput::make('site_name_uz')->label('Site name')->required()->maxLength(255),
                            TextInput::make('site_short_name_uz')->label('Short name')->maxLength(100),
                            TextInput::make('address_uz')->label('Address')->maxLength(500),
                            Textarea::make('footer_description_uz')->label('Footer description'),
                            Textarea::make('meta_description_uz')->label('Meta description')->maxLength(500),
                            TextInput::make('meta_keywords_uz')->label('Meta keywords')->maxLength(500),
                        ]),
                        Tab::make('Русский')->schema([
                            TextInput::make('site_name_ru')->label('Site name')->maxLength(255),
                            TextInput::make('site_short_name_ru')->label('Short name')->maxLength(100),
                            TextInput::make('address_ru')->label('Address')->maxLength(500),
                            Textarea::make('footer_description_ru')->label('Footer description'),
                            Textarea::make('meta_description_ru')->label('Meta description')->maxLength(500),
                            TextInput::make('meta_keywords_ru')->label('Meta keywords')->maxLength(500),
                        ]),
                        Tab::make('English')->schema([
                            TextInput::make('site_name_en')->label('Site name')->maxLength(255),
                            TextInput::make('site_short_name_en')->label('Short name')->maxLength(100),
                            TextInput::make('address_en')->label('Address')->maxLength(500),
                            Textarea::make('footer_description_en')->label('Footer description'),
                            Textarea::make('meta_description_en')->label('Meta description')->maxLength(500),
                            TextInput::make('meta_keywords_en')->label('Meta keywords')->maxLength(500),
                        ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->packTranslatable(
            $this->form->getState(),
            ['site_name', 'site_short_name', 'address', 'footer_description', 'meta_description', 'meta_keywords'],
        );

        app(UpdateSiteSettingAction::class)->handle(SiteSettingData::from($data));

        Notification::make()->title('Saved')->success()->send();
    }
}
