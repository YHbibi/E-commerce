<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouleursTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('couleurs', function (Blueprint $table) {

            $table->bigIncrements("idCouleur");
            $table->string("libCouleur");
            $table->timestamps();


            $table->engine = 'InnoDB';
            //Schema::rename('couleurs', 'couleur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('couleurs');
    }
}
