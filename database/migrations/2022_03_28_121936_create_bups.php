<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBups extends Migration
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
            $table->foreignId('id_bendera')
                ->nullable()
                ->references('id')
                ->on('bendera')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->string('tgl_datang')->nullable();
            $table->string('isi_kotor')->nullable();
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
        Schema::dropIfExists('bup');
    }
}
