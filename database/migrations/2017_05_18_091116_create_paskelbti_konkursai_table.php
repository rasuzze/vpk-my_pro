<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaskelbtiKonkursaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paskelbtas_konkursas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('paskelb_data');
            $table->decimal('numeris', 10, 0)->unsigned();
            $table->string('pavadinimas');
            $table->string('nuoroda');
            $table->date('konkurso_data');
            $table->time('valanda');
            $table->integer('po_id')->unsigned();  
            $table->foreign('po_id')->references("id")->on("perk_organizacijas");
            $table->string('garantas');
            $table->string('pastabos')->nullable();
            $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references("id")->on("users");
            $table->string('vieta')->nullable();
            $table->decimal('maz_kaina', 15, 2)->unsigned()->nullable();
            $table->string('laimetojas')->nullable();
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
        Schema::dropIfExists('paskelbti_konkursai');
    }
}
