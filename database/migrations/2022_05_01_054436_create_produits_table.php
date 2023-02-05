<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('produits', function (Blueprint $table) {
            $table->string("referenceProduit");
            $table->string("titreProduit");
            $table->string("descriptionProduit");
            $table->string("imageProduit");
            $table->double("prixProduit", 8, 2);
            $table->integer("quantiteProduitVend")->default(0);
            $table->integer("quantiteProduitDisp");
            $table->integer("poidsProduit");
            $table->primary('referenceProduit');

            $table->unsignedBigInteger("idF"); // cle etrangere
            $table->unsignedBigInteger("idCat"); // cle etrangere
            $table->unsignedBigInteger("idCouleur"); // cle etrangere

            $table->foreign('idF')
                ->references('idF')
                ->on('fournisseurs')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('idCat')
                ->references('idC')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('idCouleur')
                ->references('idCouleur')
                ->on('couleurs')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->engine = 'InnoDB';
        });


        Schema::table('produits', function (Blueprint $table) {
            $table->string('descriptionProduit', 1000)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('produits');
    }
}
