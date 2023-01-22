<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_department', function (Blueprint $table) {
            $table->bigIncrements('id_department');
            $table->integer('id_unit_kerja')->unsigned();
            $table->index('id_unit_kerja');
            $table->foreign('id_unit_kerja')->references('id_unit_kerja')->on('tb_unit_kerja');
            $table->string('nama_department');
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
        Schema::dropIfExists('tb_department');
    }
};
