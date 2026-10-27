<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('laporans')) {
            return;
        }

        Schema::table('laporans', function (Blueprint $table) {
            if (! Schema::hasColumn('laporans', 'alamat_lokasi')) {
                $table->text('alamat_lokasi')->nullable();
            }

            if (! Schema::hasColumn('laporans', 'keterangan')) {
                $table->text('keterangan')->nullable();
            }

            if (! Schema::hasColumn('laporans', 'foto')) {
                $table->string('foto')->nullable();
            }
        });

        if (Schema::hasColumn('laporans', 'lokasi')) {
            DB::table('laporans')
                ->whereNull('alamat_lokasi')
                ->update(['alamat_lokasi' => DB::raw('lokasi')]);
        }
    }

    public function down(): void
    {
        // The columns may have existed before this migration on upgraded databases.
    }
};
