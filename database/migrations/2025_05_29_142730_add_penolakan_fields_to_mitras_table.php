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
    Schema::table('mitras', function (Blueprint $table) {
        $table->string('alasan_penolakan')->nullable();
        $table->text('deskripsi_penolakan')->nullable();
    });
}

public function down()
{
    Schema::table('mitras', function (Blueprint $table) {
        $table->dropColumn(['alasan_penolakan', 'deskripsi_penolakan']);
    });
}
};
