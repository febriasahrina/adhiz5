<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tim', function (Blueprint $table) {
            $table->bigIncrements('id_tim');
            $table->integer('id_kepesertaan')->unsigned();
            $table->index('id_kepesertaan');
            $table->foreign('id_kepesertaan')->references('id_kepesertaan')->on('tb_kepesertaan');
            $table->string('nama');
            $table->string('npp');
            $table->string('unit_kerja');
            $table->string('email');
            $table->string('no_hp');
            $table->string('status_tim');
            $table->string('id_employee')->nullable();
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
        Schema::dropIfExists('tb_tim');
    }
};
