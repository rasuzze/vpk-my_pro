<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('paskelbtas_konkursas_id')->unsigned();  
            $table->foreign('paskelbtas_konkursas_id')->references("id")->on("paskelbtas_konkursas");
            // $table->integer('paskelbtas_konkurso_ts_id')->unsigned()->nullable();
            // $table->foreign('paskelbtas_konkurso_ts_id')->references("id")->on("paskelbtas_konkurso_ts");
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
        Schema::dropIfExists('file_uploads');
    }
}
