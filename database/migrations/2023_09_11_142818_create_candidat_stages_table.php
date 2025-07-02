<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidat_stages', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->unsignedBigInteger('recrutement_id');
            $table->foreign('recrutement_id')->references('id')->on('recrutement_stages');
            $table->date('date_naissance');
            $table->string('email')->unique();
            $table->string('tel');


            $table->string('niveauEtude');
            $table->string('diplome');
            $table->string('descriptionExperience');
            $table->string('cv')->nullable();
            $table->unsignedBigInteger('candidat_id')->nullable();
            $table->tinyInteger('statut')->default(0);
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
        Schema::dropIfExists('candidat_stages');
    }
};
