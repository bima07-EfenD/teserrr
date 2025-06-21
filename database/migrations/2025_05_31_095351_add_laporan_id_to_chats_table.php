<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLaporanIdToChatsTable extends Migration
{
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->unsignedBigInteger('laporan_id')->nullable()->after('receiver_id');
            $table->foreign('laporan_id')->references('id')->on('laporans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign(['laporan_id']);
            $table->dropColumn('laporan_id');
        });
    }
}
