<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('laporans')) {
            return;
        }

        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->text('alamat_lokasi');
            $table->text('keterangan');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};