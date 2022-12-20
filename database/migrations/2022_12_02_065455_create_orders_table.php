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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderno')->nullable();
            $table->boolean('financialstatemment')->default(false);
            $table->string('datetime')->nullable();
            $table->longText('shippingaddress')->nullable();
            $table->double('total')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->unsignedBigInteger('food_id');
            
            $table->foreign('food_id')
            ->references('id')
            ->on('foods')
            ->constrained()
            ->onDelete('cascade');
            $table->foreignId('user_id')->nullable()  
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('orderstatus_id')->nullable()
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
        Schema::dropIfExists('orders');
    }
};
