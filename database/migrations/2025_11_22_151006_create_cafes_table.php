<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_cafe');
            $table->text('alamat');
            $table->string('jam_buka');
            // Kolom-kolom tambahan (nullable = boleh kosong dulu)
            $table->text('deskripsi')->nullable();
            $table->string('maps_link')->nullable();
            $table->json('fasilitas')->nullable();
            $table->string('foto_menu')->nullable();
            $table->string('foto_utama')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cafes');
    }
};
