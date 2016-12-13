<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RumahMakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumahmakan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_rm');
            $table->string('nomor');
            $table->string('kota');
            $table->string('alamat');
            $table->string('nama_pemilik');
            $table->string('username');
            $table->string('password');
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
        Schema::drop('rumahmakan');
    }
}
