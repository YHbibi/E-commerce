<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id("idUtilisateur");
            $table->string("nom");
            $table->string("prenom");
            $table->string("email")->unique();
            $table->string("mdp");
            $table->date("dateNaissance");
            $table->string("tel");
            $table->string("sex");
            $table->string("adresse");
            $table->integer("codePostal");
            $table->integer("admin")->default(0);

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('utilisateurs');
    }
}
