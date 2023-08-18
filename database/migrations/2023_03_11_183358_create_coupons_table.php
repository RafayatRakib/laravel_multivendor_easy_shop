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
        Schema::create('coupons', function (Blueprint $table) {
            // $table->id();
            // $table->integer('vendor_id')->nullable();
            // // $table->enum('user',['admin','vendor']);
            // $table->string('coupon_name');
            // $table->enum('type',['parsent','amount']);
            // $table->integer('coupon_discount');
            // $table->string('coupon_validity');
            // $table->string('mini_amount');
            // $table->integer('is_one_time')->default(1);;
            // $table->integer('status')->default(1);
            // $table->timestamps();

            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('coupon_code')->unique();
            $table->text('description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('discount_type', ['percentage', 'fixed_amount']);
            $table->string('discount_amount');
            $table->string('discount_percentage');
            $table->string('minimum_purchase_amount');
            $table->enum('status', ['active', 'expired'])->default('active');
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
        Schema::dropIfExists('coupons');
    }
};
