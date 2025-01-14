<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('basket_id');
            $table->integer('amount');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('comment')->nullable();
            $table->string('delivery');
            $table->string('payment');

            $table->foreign('basket_id')
                ->references('id')
                ->on('baskets')
                ->cascadeOnDelete();

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
