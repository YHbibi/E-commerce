<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id("idF");
            $table->string("codeFournisseur")->unique();
            $table->string("nomFournisseur");
            $table->string("prenomFournisseur");
            $table->string("telFournisseur");
            $table->timestamps();

            //Schema::rename('fournisseurs', 'fournisseur');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('fournisseurs');
    }
}
