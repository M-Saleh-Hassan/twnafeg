<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SlideText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_text', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slide_id')->unsigned()->nullable();
            $table->foreign('slide_id')->references('id')->on('slides')->onDelete('cascade');
            $table->tinyInteger('order')->nullable();
            $table->enum('type',['h1','h2','h3','h4','h5','h6'])->default('h1');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
