<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id')->index()->unsigned();
            $table->integer('product_id')->index()->unsigned();
            $table->integer('discount');
            $table->integer('create_user_id')->index()->nullable()->unsigned();
            $table->integer('update_user_id')->index()->nullable()->unsigned();
            $table->integer('delete_user_id')->index()->nullable()->unsigned();
            $table->timestamps();
        });


        Schema::table('discounts', function (Blueprint $table) {
    
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('create_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('update_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('delete_user_id')->references('id')->on('users')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
