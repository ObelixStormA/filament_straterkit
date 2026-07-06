<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            if (! Schema::hasColumn('menus', 'link_type')) {
                $table->string('link_type')->default('url')->after('label');
            }

            if (! Schema::hasColumn('menus', 'location')) {
                $table->string('location')->default('header')->after('link_type');
            }

            if (! Schema::hasColumn('menus', 'section_anchor')) {
                $table->string('section_anchor')->nullable()->after('route_name');
            }

            if (! Schema::hasColumn('menus', 'open_in_new_tab')) {
                $table->boolean('open_in_new_tab')->default(false)->after('is_active');
            }

            if (! Schema::hasColumn('menus', 'page_id')) {
                $table->foreignId('page_id')->nullable()->after('parent_id')->constrained('pages')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            if (Schema::hasColumn('menus', 'page_id')) {
                $table->dropConstrainedForeignId('page_id');
            }

            $table->dropColumn(['link_type', 'location', 'section_anchor', 'open_in_new_tab']);
        });
    }
};
