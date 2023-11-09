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
        Schema::create('penempatan', function (Blueprint $table) {
            $table->id('id_penempatan');
            $table->unsignedBigInteger('id_mitra');
            $table->foreign('id_mitra')
                ->references('id_dudi')
                ->on('dudi')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->date('tgl_mulai_pkl');
            $table->date('tgl_selesai_pkl')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penempatan');
    }
};
