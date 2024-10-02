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
        Schema::create('tlm_orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('tax', 11)->default('0');
            $table->string('discount', 11)->default('0');
            $table->string('sum', 11)->default('0');
            $table->string('total', 11)->default('0');
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('status')->default('new');
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            $table->index('user_id', 'order_user_idx');
            $table->foreign('user_id', 'order_user_fk')
                ->on('tlm_users')
                ->references('id')
                ->cascadeOnDelete();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tlm_orders');
    }
}
