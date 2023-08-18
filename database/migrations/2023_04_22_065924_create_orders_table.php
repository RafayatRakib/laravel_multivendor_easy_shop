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

        // CREATE TABLE `orders` (
        //     `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        //     `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        //     `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
        //     `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
        //     `amount` double DEFAULT NULL,
        //     `address` text COLLATE utf8_unicode_ci,
        //     `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
        //     `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        //     `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
        //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
          
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('upazila_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('adress')->nullable();
            $table->string('post_code')->nullable();
            $table->text('notes')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency')->nullable();
            $table->float('amount',8,2);
            $table->float('delevarycharg',8,2);
            $table->string('order_number')->nullable();
            $table->string('invoice_no');
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');
            $table->string('confirmed_date')->nullable();
            $table->string('processing_date')->nullable();
            $table->string('picked_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('delivered_date')->nullable();
            $table->string('cancel_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_reason')->nullable();
            $table->string('return_order')->default(1);
            $table->string('status'); 
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
