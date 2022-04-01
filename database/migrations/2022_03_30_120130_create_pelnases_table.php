<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelnasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelnas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kapal');
            $table->foreignId('id_bendera')
                ->nullable()
                ->references('id')
                ->on('bendera')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('isi_kotor')->nullable();
            $table->string('tgl_datang')->nullable();
            $table->foreignId('id_terminal_datang')
                ->nullable()
                ->references('id')
                ->on('terminal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('id_pelabuhan_datang')
                ->nullable()
                ->references('id')
                ->on('pelabuhan')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('jumlah_bongkar_datang')->nullable();
            $table->string('jenis_muatan_datang')->nullable();
            $table->string('tgl_berangkat')->nullable();
            $table->foreignId('id_terminal_berangkat')
                ->nullable()
                ->references('id')
                ->on('terminal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('id_pelabuhan_berangkat')
                ->nullable()
                ->references('id')
                ->on('pelabuhan')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('jumlah_muatan_berangkat')->nullable();
            $table->string('jenis_muatan_berangkat')->nullable();
            $table->foreignId('id_status_trayek_datang')
                ->nullable()
                ->references('id')
                ->on('status_trayek')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('id_status_trayek_berangkat')
                ->nullable()
                ->references('id')
                ->on('status_trayek')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('id_status_kapal_datang')
                ->nullable()
                ->references('id')
                ->on('status_kapal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('id_status_kapal_berangkat')
                ->nullable()
                ->references('id')
                ->on('status_kapal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('id_jenis_kapal_datang')
                ->nullable()
                ->references('id')
                ->on('jenis_kapal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('id_jenis_kapal_berangkat')
                ->nullable()
                ->references('id')
                ->on('jenis_kapal')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('input_oleh')->nullable();
            $table->string('update_oleh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelnas');
    }
}
