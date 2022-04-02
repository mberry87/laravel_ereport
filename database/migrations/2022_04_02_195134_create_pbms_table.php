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
            $table->foreignId('id_jenis_kapal')
                ->nullable()
                ->references('id')
                ->on('jenis_kapal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('ukuran_isi_kotor')->nullable();
            $table->string('ukuran_dwt')->nullable();
            $table->string('ukuran_loa')->nullable();
            $table->string('muat_sistem')->nullable();
            $table->string('muat_komiditi')->nullable();
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
            $table->string('agen_muat');
            $table->string('bongkar_sistem')->nullable();
            $table->string('bongkar_komiditi')->nullable();
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
            $table->string('agen_bongkar');
            $table->string('input_oleh')->nullable();
            $table->string('update_oleh')->nullable();
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
