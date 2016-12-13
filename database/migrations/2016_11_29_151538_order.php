<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('order', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_pemesan');
        $table->string('nama_pemesan');
        $table->string('pesanan');
        $table->integer('jumlah');
        $table->integer('total');
        $table->integer('rumahmakan_id');
        $table->string('nama_rm');
        $table->string('status');
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
        Schema::drop('order');
    }
}
