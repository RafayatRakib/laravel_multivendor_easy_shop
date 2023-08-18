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
        Schema::create('retrurns', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->string('user_id')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('qty');
            $table->float('price',8,2); 
            $table->text('reason_for_return')->nullable();
            $table->string('cancel_status')->nullable();
            $table->string('cancle_reson')->nullable();
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
        Schema::dropIfExists('retrurns');
    }
};
