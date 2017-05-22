<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerkOrganizacijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perk_organizacijas', function (Blueprint $table) {
             $table->increments('id');
            $table->string('pavadinimas');
            $table->decimal('kodas', 9, 0)->unsigned();
            $table->string('adresas');           
            $table->string('email')->nullable();
            $table->decimal('tel', 9, 0)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perk_organizacijos');
    }
}
