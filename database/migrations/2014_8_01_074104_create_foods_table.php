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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')
            ->references('id')
            ->on('restaurants')
            ->constrained()
            ->onDelete('cascade');
            $table->string('name', 50); 
            $table->string('caloriecount')->nullable();
            $table->string('cuisine')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedDecimal('price');
            $table->double('discountpercentage')->nullable(); 
            $table->boolean('available')->default(0); 
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
        Schema::dropIfExists('foods');
    }
};
