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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('username');
            $table->text('kata_kunci');
            $table->string('gelar_depan')->nullable();
            $table->string('nama_lengkap');
            $table->string('gelar_belakang')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('golongan_darah')->nullable();
            $table->text('alamat')->nullable();
            $table->string('catatan_kesehatan')->nullable();
            $table->unsignedBigInteger('id_jenis_pengguna');
            $table->foreign('id_jenis_pengguna')
                ->references('id_jenis_pengguna')
                ->on('jenis_pengguna')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        DB::table('pengguna')->insert([
            'username' => 'admin',
            'kata_kunci' => '$2y$12$7N6Ubn7U/cNl08Y2zGkphO/Ik4NtgS72MVaAyBoVZLpAAn2Wgsi2K',
            'nama_lengkap' => 'admin',
            'jenis_kelamin' => 'laki-laki',
            'id_jenis_pengguna' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
