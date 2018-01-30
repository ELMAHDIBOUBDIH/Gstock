<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barre_code',20);
            $table->string('name');
            $table->string('Brand')->nullable();
            $table->string('description',500)->nullable();
            $table->double('prix_vente',15, 2)->default(0);
            $table->double('prix_achat', 15, 2)->default(0);
            $table->double('available_qnt',15, 2)->default(0);
            $table->double('min_qnt', 15, 2)->default(0);
            $table->string('image',50)->nullable();
            $table->integer('category_id');
                       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
