<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();

            $table->string('product_code_name', 10);
            $table->foreign('product_code_name')->references('code_name')->on('products');

            $table->string('product_color', 30);
            $table->string('product_size', 5);
            $table->integer('balance_amount')->unsigned();
            $table->integer('total_amount')->unsigned();
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
        Schema::dropIfExists('product_details');
    }
}
