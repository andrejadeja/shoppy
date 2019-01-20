<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('category_id')->index()->unsigned();
            $table->string('product_number')->unique();
            $table->string('product');
            $table->text('description');
            $table->double('price', 8, 2);
            $table->string('image');
            $table->integer('create_user_id')->index()->nullable()->unsigned();
            $table->integer('update_user_id')->index()->nullable()->unsigned();
            $table->integer('delete_user_id')->index()->nullable()->unsigned();
            $table->softDeletes();
            $table->timestamps();

        });


        Schema::table('products', function (Blueprint $table) {
    
            //$table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
