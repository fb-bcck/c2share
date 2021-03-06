<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamation', function (Blueprint $table) {
            $table->id('reclamationId');
            $table->integer('type');
            $table->integer('ownerId')->unsigned();
            $table->integer('buyerId')->unsigned();
            $table->integer('historyId');
            $table->string('description',200);
            $table->integer('reclamationStatus')->default(1);
            $table->timestamps();


        });

        Schema::table('reclamation',function($table){
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
        Schema::dropIfExists('reclamation');
    }
}
