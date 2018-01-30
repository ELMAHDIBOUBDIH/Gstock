<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatVenteCommandesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('vente_commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->date('date');
            $table->string('etat')->nullable();
            $table->double('total', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('vente_commandes');
    }

}
