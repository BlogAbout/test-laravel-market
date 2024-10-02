<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tlm_order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('qty')->default(0);
            $table->string('cost')->default('0');
            $table->string('sum')->default('0');

            $table->timestamps();

            $table->index(['order_id', 'product_id'], 'order_product_idx');

            $table->index('order_id', 'order_item_order_idx');
            $table->foreign('order_id', 'order_item_order_fk')
                ->on('tlm_orders')
                ->references('id')
                ->cascadeOnDelete();

            $table->index('product_id', 'order_item_product_idx');
            $table->foreign('product_id', 'order_item_product_fk')
                ->on('tlm_products')
                ->references('id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tlm_order_items');
    }
}
