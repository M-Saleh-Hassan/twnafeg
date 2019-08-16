<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('logo')->unsigned()->nullable();
            $table->foreign('logo')->references('id')->on('media')->onDelete('cascade');
            $table->integer('fav')->unsigned()->nullable();
            $table->foreign('fav')->references('id')->on('media')->onDelete('cascade');
            $table->string('website_title')->nullable();
            $table->string('email')->nullable();
            $table->text('facebook_link')->nullable();
            $table->tinyInteger('facebook_link_show')->default(1);
            $table->text('whatsapp_number')->nullable();
            $table->tinyInteger('whatsapp_number_show')->default(1);
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
