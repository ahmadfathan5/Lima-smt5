<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nim');
            $table->string('nidn');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tlahir');
            $table->date('tgllahir');
            $table->string('semester')->nullable();
            $table->integer('kelompok')->nullable();
            $table->enum('role',['admin','mahasiswa','dosen','scrum master']);
            $table->enum('gender', ['Pria','Wanita']);
            $table->string('nohp')->nullable();
            $table->string('foto')->nullable();
            $table->integer('prodi_id')->nullable();
            $table->string('fingerprint_code')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
