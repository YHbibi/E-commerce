<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id("referenceCommande");
            $table->dateTime("dateCommandePass");
            $table->date("dateCommandeLiv");
            $table->string("etat")->default('en cours de traitement');
            $table->unsignedBigInteger("idU"); // cle etrangere

            $table->foreign('idU')
                ->references('idUtilisateur')
                ->on('utilisateurs')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('commandes');
    }
}
