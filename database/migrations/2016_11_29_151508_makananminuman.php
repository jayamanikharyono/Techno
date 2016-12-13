<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Makananminuman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makananminuman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('jenis');
            $table->integer('harga');
            $table->integer('rumahmakan_id');
            $table->string('nama_rm');
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
        Schema::drop('makananminuman');
    }
}
