<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_user_id');
            $table->string('quantity',15);
            $table->unsignedBigInteger('customer_places_id');
            $table->string('total',15);
            $table->timestamps();
            $table->unsignedBigInteger('cafe_id');
            $table->foreign('product_user_id')->references('id')->on('product_user')->onDelete('cascade');
            $table->foreign('cafe_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_places_id')->references('id')->on('customer_places');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
