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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->boolean('approved')->default(false);
            $table->string('name')->unique()->index();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address')->nullable();
            $table->longText('mainimage')->nullable();
            $table->boolean('active')->default(false);
            $table->unsignedDecimal('delivery_fee')->default(0.00);
            $table->string('password')->nullable(); 
            $table->rememberToken();
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
        Schema::dropIfExists('restaurants');
    }
};
