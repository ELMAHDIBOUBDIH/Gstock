<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatVenteLignesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('vente_lignes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vente_lignes_commande_id');
            $table->integer('id_article');
            $table->double('qnt_cmd',15, 2)->default(0);
            $table->double('prix_unitaire',15, 2)->default(0);
             $table->double('TVA',15, 2)->default(0);
            $table->double('T_HT',15, 2)->default(0);
            $table->double('T_TTC',15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('vente_lignes');
    }

}
