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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->nullable();
            $table->integer('cat_id')->nullable();
            $table->integer('sub_cat_id')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_slug')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_qty')->nullable();
            $table->string('product_tags')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->text('short_des')->nullable();
            $table->text('long_des')->nullable();
            $table->string('product_cover')->nullable();
            $table->string('hot_deals')->nullable();
            $table->string('featured')->nullable();
            $table->string('special_offer')->nullable();
            $table->string('special_deals')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('products');
    }
};
