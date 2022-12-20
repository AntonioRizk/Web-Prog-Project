<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('food_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->constrained()
                ->onDelete('cascade');

                $table->foreign('food_id')
                ->references('id')
                ->on('foods')
                ->constrained()
                ->onDelete('cascade');
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
        Schema::dropIfExists('orderdetails');
    }
};
