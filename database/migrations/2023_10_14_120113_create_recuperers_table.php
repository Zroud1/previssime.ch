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
        Schema::create('recuperers', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
             $table->date('dateNaissance')->nullable();
            $table->string('adresse')->nullable();
            $table->string('sexe')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->string('npa')->nullable();
            $table->string('telephone')->nullable();
            $table->string('numeroAvs')->nullable();
            $table->string('caissePensionActuelle')->nullable();
            $table->string('travaille')->nullable();
            $table->string('salarie')->nullable();
            $table->longText('recto')->nullable();
            $table->longText('verso')->nullable();
            $table->text('signature')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recuperers');
    }
};
