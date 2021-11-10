<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_ip',20)->nullable;
            $table->unsignedBigInteger('product_user_id', 0);
            $table->unsignedBigInteger('cafe_id', 0);
            $table->string('item',50);
            $table->string('total',15);
            $table->string('quantity',15);
            $table->unsignedBigInteger('customer_places_id', 0);
            $table->timestamps();
            $table->foreign('product_user_id')->references('id')->on('product_user')->onDelete('cascade');
            //$table->foreign('customer_places_id')->references('id')->on('customer_places');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
