<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('shop_id')->index()->unsigned();
            $table->string('title');
            $table->timestamp('valid_until');
            $table->integer('create_user_id')->index()->nullable()->unsigned();
            $table->integer('update_user_id')->index()->nullable()->unsigned();
            $table->integer('delete_user_id')->index()->nullable()->unsigned();
            $table->timestamps();

        });


        Schema::table('sales', function (Blueprint $table) {
    
            //$table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
}
