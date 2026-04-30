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
    Schema::table('karyas', function (Blueprint $table) {
        // Kita tambahin kolom alasan_tolak setelah kolom status
        // Pakai nullable() karena kalau statusnya 'approved', alasannya pasti kosong
        $table->text('alasan_tolak')->nullable()->after('status');
    });
}

public function down(): void
{
    Schema::table('karyas', function (Blueprint $table) {
        $table->dropColumn('alasan_tolak');
    });
}
};
