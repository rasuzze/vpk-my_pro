<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaskelbtasKonkursoTsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paskelbtas_konkurso_ts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('paskelb_data');
            $table->decimal('numeris', 10, 0)->unsigned();
            $table->string('pavadinimas');
            $table->string('nuoroda');
            $table->date('galiojimo_data');
            $table->time('valanda')->nullable();
            $table->integer('po_id')->unsigned();  
            $table->foreign('po_id')->references("id")->on("perk_organizacijas");
             $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references("id")->on("users");
            $table->string('pastabos')->nullable();            
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
        Schema::dropIfExists('paskelbtas_konkurso_ts');
    }
}
