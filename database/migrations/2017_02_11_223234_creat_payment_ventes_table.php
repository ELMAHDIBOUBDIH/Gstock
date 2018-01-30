<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatPaymentventesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_ventes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->date('date');
            $table->string('type')->nullable();
            $table->double('payer',15, 2)->default(0);
            $table->double('montant',15, 2)->default(0);
            $table->double('rest_pay',15, 2)->default(0);
            $table->string('description')->nullable();
            
          
            
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
        Schema::dropIfExists('payment_ventes');
    }
}
