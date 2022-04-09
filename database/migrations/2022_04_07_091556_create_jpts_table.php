<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jpt', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_kapal');
            $table->foreignId('id_bendera')
                ->nullable()
                ->references('id')
                ->on('bendera')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('id_jenis_kapal')
                ->nullable()
                ->references('id')
                ->on('jenis_kapal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('agen_muat')->nullable();
            $table->string('tgl_muat')->nullable();
            $table->string('ukuran_isi_kotor')->nullable();
            $table->string('ukuran_dwt')->nullable();
            $table->string('ukuran_loa')->nullable();
            $table->string('muat_sistem')->nullable();
            $table->string('muat_komoditi')->nullable();
            $table->string('muat_jenis')->nullable();
            $table->string('muat_ton')->nullable();
            $table->string('muat_unit')->nullable();
            $table->string('muat_m3')->nullable();
            $table->foreignId('id_terminal_muat')
                ->nullable()
                ->references('id')
                ->on('terminal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('tgl_mulai_muat')->nullable();
            $table->string('tgl_selesai_muat')->nullable();
            $table->string('perusahaan_muat_pengirim')->nullable();
            $table->string('perusahaan_muat_penerima')->nullable();
            $table->string('agen_bongkar')->nullable();
            $table->string('tgl_bongkar')->nullable();
            $table->string('bongkar_sistem')->nullable();
            $table->string('bongkar_komoditi')->nullable();
            $table->string('bongkar_jenis')->nullable();
            $table->string('bongkar_ton')->nullable();
            $table->string('bongkar_unit')->nullable();
            $table->string('bongkar_m3')->nullable();
            $table->foreignId('id_terminal_bongkar')
                ->nullable()
                ->references('id')
                ->on('terminal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('input_oleh')->nullable();
            $table->string('update_oleh')->nullable();
            $table->foreignId('id_user')
                ->nullable()
                ->references('id')
                ->on('users')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('tgl_mulai_bongkar')->nullable();
            $table->string('tgl_selesai_bongkar')->nullable();
            $table->string('perusahaan_bongkar_pengirim')->nullable();
            $table->string('perusahaan_bongkar_penerima')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jpt');
    }
}
