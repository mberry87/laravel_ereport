<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToKeagenanKapal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keagenan_kapal', function (Blueprint $table) {
            $table->foreignId('id_pelabuhan_datang')
                ->nullable()
                ->references('id')
                ->on('pelabuhan')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
            $table->foreignId('id_pelabuhan_berangkat')
                ->nullable()
                ->references('id')
                ->on('pelabuhan')
                ->onUpdate('SET NULL')
                ->onDelete('SET NULL');
        });
    }
}
