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
            // Drop the existing enum column
            $table->dropColumn('status');
        });

        Schema::table('mitras', function (Blueprint $table) {
            // Add the new enum column with the updated values
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak', 'nonaktif'])->default('menunggu')->after('kontrak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mitras', function (Blueprint $table) {
            // Drop the new enum column
            $table->dropColumn('status');
        });

        Schema::table('mitras', function (Blueprint $table) {
            // Add back the original enum column
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu')->after('kontrak');
        });
    }
};
