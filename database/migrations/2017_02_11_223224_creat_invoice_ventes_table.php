<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatinvoiceventesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_ventes', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('reference_cmd');
            $table->string('invoice_type');
            $table->date('date');
            $table->double('credit',15, 2)->default(0);
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
        Schema::dropIfExists('invoice_ventes');
    }
}
