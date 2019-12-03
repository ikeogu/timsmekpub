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
            $table->bigIncrements('id');
            $table->string('order_id')->nullable();
            $table->text('cart');
            $table->string('country')->default('Nigeria')->nullable();
            $table->string('state')->nullable();
            $table->string('address');
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->string('çity');
            $table->string('status');
            $table->string('paid_at')->nullable();
            $table->integer('amount');
            $table->string('currency')->nullable();
            $table->integer('quantity');
            $table->unsignedBigInteger('user_id')->nullable();
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
}
