<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial_cat');
            $table->integer('serial');
            $table->integer('supplier_id');
            $table->integer('weight');
            $table->integer('unit_id');
            $table->integer('cat_id');
            $table->string('product_name');
            $table->string('unit_price')->nullable();
            $table->double('quantity')->default('0');
            $table->double('total_price')->nullable();
            $table->integer('status')->default('1');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
}
