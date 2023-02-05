<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('factures', function (Blueprint $table) {
            $table->id("idFacture");
            $table->unsignedBigInteger("referenceCommande"); // cle etrangere
            $table->date("dateFacture");
            $table->double("prixTotal", 8, 2);

            $table->foreign('referenceCommande')
                ->references('referenceCommande')
                ->on('commandes')
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
        Schema::dropIfExists('factures');
    }
}
