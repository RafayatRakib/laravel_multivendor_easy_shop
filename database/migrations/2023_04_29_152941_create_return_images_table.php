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
        Schema::create('return_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('return_id');
            $table->foreign('return_id')->references('id')->on('retrurns')->onDelete('cascade');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('images');
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
        Schema::dropIfExists('return_images');
    }
};
