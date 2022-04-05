<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePbmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbm', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_kapal');
            $table->foreignId('id_bendera')
                ->nullable()
                ->references('id')
                ->on('bendera')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('id_jenis_kapal_muat')
                ->nullable()
                ->references('id')
                ->on('jenis_kapal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('agen_muat')->nullable();
            $table->string('tgl_muat')->nullable();
            $table->string('ukuran_isi_kotor_muat')->nullable();
            $table->string('ukuran_dwt_muat')->nullable();
            $table->string('ukuran_loa_muat')->nullable();
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
            $table->string('agen_bongkar')->nullable();
            $table->string('tgl_bongkar')->nullable();
            $table->string('ukuran_isi_kotor_bongkar')->nullable();
            $table->string('ukuran_dwt_bongkar')->nullable();
            $table->string('ukuran_loa_bongkar')->nullable();
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
            $table->foreignId('id_jenis_kapal_bongkar')
            ->nullable()
                ->references('id')
                ->on('jenis_kapal')
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pbm');
    }
}
