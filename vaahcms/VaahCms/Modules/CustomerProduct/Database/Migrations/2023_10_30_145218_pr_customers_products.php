<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrCustomersProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pr_customers_products', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable()->index();

            $table->bigInteger('customer_id')->unsigned()->nullable()->index();
            $table->foreign('customer_id')->references('id')->on('pr_customers')->onDelete('cascade');
            $table->bigInteger('product_id')->unsigned()->nullable()->index();
            $table->foreign('product_id')->references('id')->on('pr_products')->onDelete('cascade');

            $table->boolean('is_active')->nullable()->index();

            //----common fields
            $table->text('meta')->nullable();
            $table->integer('created_by')->nullable()->index();
            $table->integer('updated_by')->nullable()->index();
            $table->integer('deleted_by')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['created_at', 'updated_at', 'deleted_at']);
            //----/common fields

        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('pr_customers_products');
    }
}
