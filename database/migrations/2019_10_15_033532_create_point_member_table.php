<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('point_member', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('point');
            $table->enum('keterangan', ['Terlambat Hadir','Tidak Hadir','Berpakaian tidak sesuai ketentuan','Tidak mengikuti daily meeting','Tidak mengikuti penuh waktu','Bermain game dan sosial media']);
            $table->integer('dosen_scrum_master_id');
            $table->integer('sprint_id');
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
        Schema::dropIfExists('point_member');
    }
}
