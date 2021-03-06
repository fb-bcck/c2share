<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry', function (Blueprint $table) {
            $table->id('inquiryId');
            $table->integer('statusflag');
            $table->string('text',200);
            $table->integer('advertId')->unsigned();
            $table->integer('ownerId')->unsigned();

            $table->integer('buyerId')->unsigned();
            $table->timestamps();



        });

        Schema::table('inquiry',function($table){
            $table->foreign('ownerId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('buyerId')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('advertId')->references('advertId')->on('advert');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiry');
    }
}
