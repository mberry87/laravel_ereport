<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTersusDatangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tersus_datang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kapal');
            $table->string('bendera');
            $table->string('gt');
            $table->string('tanggal_berangkat');
            $table->string('terminal_berangkat');
            $table->string('kegiatan_berangkat');
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
        Schema::dropIfExists('tersus_datang');
    }
}
