<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mitras', function (Blueprint $table) {
            // Tambah kolom foreign key terlebih dahulu
            $table->foreignId('provinsi_id')->after('jumlah_pohon')->nullable()->constrained('provinsis')->onDelete('cascade');
            $table->foreignId('kabupaten_id')->after('provinsi_id')->nullable()->constrained('kabupatens')->onDelete('cascade');
            $table->foreignId('kecamatan_id')->after('kabupaten_id')->nullable()->constrained('kecamatans')->onDelete('cascade');
            $table->foreignId('desa_id')->after('kecamatan_id')->nullable()->constrained('desas')->onDelete('cascade');
        });

        // Update data yang ada
        DB::statement('UPDATE mitras SET provinsi_id = (SELECT id FROM provinsis WHERE nama = mitras.provinsi LIMIT 1)');
        DB::statement('UPDATE mitras SET kabupaten_id = (SELECT id FROM kabupatens WHERE nama = mitras.kabupaten LIMIT 1)');
        DB::statement('UPDATE mitras SET kecamatan_id = (SELECT id FROM kecamatans WHERE nama = mitras.kecamatan LIMIT 1)');
        DB::statement('UPDATE mitras SET desa_id = (SELECT id FROM desas WHERE nama = mitras.desa LIMIT 1)');

        Schema::table('mitras', function (Blueprint $table) {
            // Hapus kolom string yang lama setelah data dipindahkan
            $table->dropColumn(['provinsi', 'kabupaten', 'kecamatan', 'desa']);
            
            // Ubah kolom menjadi required setelah data dipindahkan
            $table->foreignId('provinsi_id')->nullable(false)->change();
            $table->foreignId('kabupaten_id')->nullable(false)->change();
            $table->foreignId('kecamatan_id')->nullable(false)->change();
            $table->foreignId('desa_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mitras', function (Blueprint $table) {
            // Tambah kembali kolom string
            $table->string('provinsi')->after('jumlah_pohon');
            $table->string('kabupaten')->after('provinsi');
            $table->string('kecamatan')->after('kabupaten');
            $table->string('desa')->after('kecamatan');
        });

        // Pindahkan data kembali
        DB::statement('UPDATE mitras SET provinsi = (SELECT nama FROM provinsis WHERE id = mitras.provinsi_id)');
        DB::statement('UPDATE mitras SET kabupaten = (SELECT nama FROM kabupatens WHERE id = mitras.kabupaten_id)');
        DB::statement('UPDATE mitras SET kecamatan = (SELECT nama FROM kecamatans WHERE id = mitras.kecamatan_id)');
        DB::statement('UPDATE mitras SET desa = (SELECT nama FROM desas WHERE id = mitras.desa_id)');

        Schema::table('mitras', function (Blueprint $table) {
            // Hapus foreign key
            $table->dropForeign(['provinsi_id']);
            $table->dropForeign(['kabupaten_id']);
            $table->dropForeign(['kecamatan_id']);
            $table->dropForeign(['desa_id']);
            
            // Hapus kolom foreign key
            $table->dropColumn(['provinsi_id', 'kabupaten_id', 'kecamatan_id', 'desa_id']);
        });
    }
};
