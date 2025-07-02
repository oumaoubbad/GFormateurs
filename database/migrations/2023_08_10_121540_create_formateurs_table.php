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
         Schema::create('formateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('cv');
            $table->string('recto')->nullable();
            $table->string('vecto')->nullable();
            $table->string('verso')->nullable();
            $table->string('attes')->nullable();
            $table->string('diplome')->nullable();
            $table->string('exp');
            $table->string('demaine');
            $table->string('spec');
            $table->string('dispo');
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
        Schema::dropIfExists('formateurs');
    }
};
