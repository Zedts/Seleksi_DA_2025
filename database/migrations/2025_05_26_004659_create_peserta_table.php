<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->decimal('wawancara', 8, 2);  // Changed to 8,2 for better precision
            $table->decimal('tes_tulis', 8, 2);
            $table->decimal('cv', 8, 2);
            $table->decimal('visimisi_proker', 8, 2);
            $table->decimal('total_score', 8, 2);
            $table->string('status_kelulusan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};