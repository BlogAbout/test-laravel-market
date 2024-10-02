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
        Schema::create('tlm_products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('cost', 11)->default('0');
            $table->string('cost_old', 11)->default('0');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('status')->default('publish');
            $table->integer('in_stoke')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamp('receipt_at')->nullable();

            $table->timestamps();

            $table->index('author_id', 'product_user_idx');
            $table->foreign('author_id', 'product_user_fk')
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
        Schema::dropIfExists('tlm_products');
    }
}
