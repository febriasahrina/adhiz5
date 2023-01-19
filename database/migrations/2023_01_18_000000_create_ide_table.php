<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ide', function (Blueprint $table) {
            $table->bigIncrements('id_ide');
            $table->integer('id_kepesertaan')->unsigned();
            $table->index('id_kepesertaan');
            $table->foreign('id_kepesertaan')->references('id_kepesertaan')->on('tb_kepesertaan');
            $table->string('nama_tim');
            $table->string('judul_ide');
            $table->text('deskripsi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ide');
    }
};
