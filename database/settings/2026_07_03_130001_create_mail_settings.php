<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mail.from_name', config('mail.from.name'));
        $this->migrator->add('mail.from_address', config('mail.from.address'));
        $this->migrator->add('mail.mailer', config('mail.default', 'log'));
    }

    public function down(): void
    {
        $this->migrator->deleteIfExists('mail.from_name');
        $this->migrator->deleteIfExists('mail.from_address');
        $this->migrator->deleteIfExists('mail.mailer');
    }
};
