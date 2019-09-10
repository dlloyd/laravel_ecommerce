<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('delivery_code')->nullable();
            $table->boolean('delivered');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_country');
            $table->string('customer_city');
            $table->string('customer_address');
            $table->string('customer_address_complement')->nullable();
            $table->string('customer_postal_code')->nullable();
            $table->json('purchase_list');

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
        Schema::dropIfExists('purchase');
    }
}
