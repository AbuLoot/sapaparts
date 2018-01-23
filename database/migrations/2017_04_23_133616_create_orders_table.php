<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', [1, 2]);
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('company_name');
            $table->string('data_1');
            $table->string('data_2');
            $table->string('data_3');
            $table->string('legal_address');
            $table->integer('city_id');
            $table->string('address');
            $table->string('count');
            $table->integer('price');
            $table->integer('amount');
            $table->integer('delivery');
            $table->integer('payment_type');
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        Schema::create('product_order', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('order_id')->unsigned();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->primary(['product_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
