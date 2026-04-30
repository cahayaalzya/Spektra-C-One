<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pesans', function (Blueprint $table) {
        $table->id();
        $table->string('tipe'); // 'report' atau 'inbox'
        $table->string('judul');
        $table->string('pengirim'); // Nama siswa (Rehan/Densi)
        $table->string('sub_info')->nullable(); // misal: "pada karya Mural Kantin" atau "XI RPL"
        $table->text('isi_pesan');
        $table->enum('status', ['unread', 'read', 'resolved'])->default('unread');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
