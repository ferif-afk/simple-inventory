<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fakultas_id')->unsigned()->nullable();
            $table->string('nama_jurusan', 50);
            $table->timestamps();
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusan');
    }
}
