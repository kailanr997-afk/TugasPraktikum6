<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('laporans')) {
            return;
        }

        Schema::table('laporans', function (Blueprint $table) {
            if (Schema::hasColumn('laporans', 'lokasi')) {
                $table->string('lokasi')->nullable()->change();
            }

            if (Schema::hasColumn('laporans', 'tinggi_genangan')) {
                $table->integer('tinggi_genangan')->nullable()->change();
            }

            if (Schema::hasColumn('laporans', 'tanggal_kejadian')) {
                $table->date('tanggal_kejadian')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        // Keep legacy fields nullable so reports submitted after this migration remain valid.
    }
};
