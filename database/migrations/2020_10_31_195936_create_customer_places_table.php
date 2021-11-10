<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_places', function (Blueprint $table) {
            $table->id();
            $table->string('exact_location');
            $table->string('telephone', 20)->nullable();
            $table->unsignedBigInteger('code', 0)->nullable();
            $table->unsignedBigInteger('cafe_id', 0);
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
        Schema::dropIfExists('customer_places');
    }
}
