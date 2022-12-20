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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->double('percentage')->nullable();
            $table->string('status')->nullable();
            $table->boolean('isonetime')->nullable();
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')
                ->references('id')
                ->on('foods')
                ->constrained()
                ->onDelete('cascade');
                $table->unsignedBigInteger('restaurant_id')->nullable();
                $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
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
        Schema::dropIfExists('offers');
    }
};
