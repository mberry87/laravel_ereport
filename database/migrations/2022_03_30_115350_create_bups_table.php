<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bup', function (Blueprint $table) {
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
            $table->string('kegiatan_datang')->nullable();
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
            $table->string('kegiatan_berangkat')->nullable();
            $table->foreignId('id_user')
                ->nullable()
                ->references('id')
                ->on('users')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
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
        Schema::dropIfExists('bup');
    }
}
