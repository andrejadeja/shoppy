<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('owner_id')->index()->unsigned();
            $table->integer('create_user_id')->index()->nullable()->unsigned();
            $table->integer('update_user_id')->index()->nullable()->unsigned();
            $table->integer('delete_user_id')->index()->nullable()->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::table('shops', function (Blueprint $table) {

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('shops');
    }
}
