<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image')->unsigned()->nullable();
            $table->foreign('image')->references('id')->on('media')->onDelete('cascade');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->string('date_text')->nullable();
            $table->date('date_to_compare')->nullable();
            $table->string('place')->nullable();
            $table->string('map')->nullable();
            $table->string('price')->nullable();
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
