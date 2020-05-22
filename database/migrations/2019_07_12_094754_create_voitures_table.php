<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricule');
            $table->string('couleur');
            $table->string('carburant');
            $table->boolean('manuelle');
            $table->double('prix');
            $table->integer('nb_places');
            $table->bigInteger('modele_id');
            $table->foreign('modele_id')->references('id')->on('modele');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voitures');
    }
}
