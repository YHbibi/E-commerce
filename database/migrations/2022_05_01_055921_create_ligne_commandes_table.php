<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneCommandesTable extends Migration {
    /** * Run the migrations. * * @return void */ public function up() {
        Schema::create('ligne_commandes', function (Blueprint $table) {

            $table->unsignedBigInteger("referenceCommande"); // cle etrangere & primaire
            $table->string("refP"); // cle etrangere & primaire
            $table->integer("quantite");
            $table->timestamps();

            $table->primary(['referenceCommande', 'refP']);

            $table->foreign('referenceCommande')
                ->references('referenceCommande')
                ->on('commandes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('refP')
                ->references('referenceProduit')
                ->on('produits')->onUpdate('cascade')
                ->onDelete('cascade');

            $table->engine = 'InnoDB';
        });
    }
    /** * Reverse the migrations. * * @return void */ public function down() {
        Schema::dropIfExists('ligne_commandes');
    }
}
