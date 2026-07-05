<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * PostgreSQL requires the notifications.data column to be a native
     * json/jsonb type for the "->>" operator Filament's database
     * notifications query uses. MySQL/SQLite tolerate a text column, so
     * this migration only acts on pgsql, and only if not already json(b).
     */
    public function up(): void
    {
        if (DB::connection()->getDriverName() !== 'pgsql') {
            return;
        }

        $currentType = DB::selectOne(
            "select data_type from information_schema.columns where table_name = 'notifications' and column_name = 'data'"
        )?->data_type;

        if (in_array($currentType, ['json', 'jsonb'], true)) {
            return;
        }

        DB::statement('ALTER TABLE notifications ALTER COLUMN data TYPE json USING data::json');
    }

    public function down(): void
    {
        if (DB::connection()->getDriverName() !== 'pgsql') {
            return;
        }

        DB::statement('ALTER TABLE notifications ALTER COLUMN data TYPE text');
    }
};
