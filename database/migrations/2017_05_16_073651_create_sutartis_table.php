<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSutartisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sutartis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pavadinimas');
            $table->string('numeris');
            $table->date('sutarties_data');            
            $table->decimal('sutarties_suma', 15, 2)->unsigned()->nullable();
            $table->date('sutartis_galioja')->nullable();
            $table->string('pastabos')->nullable();
            $table->integer('po_id')->unsigned();  
            $table->foreign('po_id')->references("id")->on("perk_organizacijas");
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
        Schema::dropIfExists('sutartis');
    }
}
