<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::create('advert', function (Blueprint $table) {
            $table->id('advertId');
            $table->string('title',200);
            $table->mediumText('description',300);
            $table->double('price');
            $table->integer('prodCategory')->unsigned();
            $table->integer('ownerId')->unsigned();
            $table->mediumText('tags',300)->nullable();
            $table->timestamps();

        });

        Schema::table('advert',function($table){
        $table->foreign('ownerId')->references('id')->on('users');
        //$table->foreign('prodCategory')->references('productCategory')->on('productCategory');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advert');
    }
}
