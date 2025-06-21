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
        Schema::table('mitras', function (Blueprint $table) {
            $table->integer('umur_pohon')->nullable()->comment('Umur pohon dalam hari');
            $table->date('tanggal_input_umur')->nullable()->comment('Tanggal pertama kali input umur pohon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mitras', function (Blueprint $table) {
            $table->dropColumn(['umur_pohon', 'tanggal_input_umur']);
        });
    }
};
