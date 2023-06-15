<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('writer_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('sub_sub_category_id');
            $table->string('product_name_en');
            $table->string('product_name_bn');
            $table->string('product_slug_en');
            $table->string('product_slug_bn');
            $table->string('product_code');
            $table->integer('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_bn');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_bn')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_bn')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->longText('short_descp_en');
            $table->longText('short_descp_bn');
            $table->longText('long_descp_en');
            $table->longText('long_descp_bn');
            $table->longText('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->enum('status', [0,1])->default(1);
            $table->timestamps();

            $table->foreign('writer_id')->references('id')->on('writers')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('sub_sub_category_id')->references('id')->on('sub_sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
