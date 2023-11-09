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
        Schema::create('jenis_pengguna', function (Blueprint $table) {
            $table->id('id_jenis_pengguna');
            $table->string('jenis_pengguna');
            $table->string('keterangan');
        });

        DB::table('jenis_pengguna')->insert([
            'jenis_pengguna' => 'admin',
            'keterangan' => 'Ini role Admin'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pengguna');
    }
};
