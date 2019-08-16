<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Test extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('comment');
            // $table->foreign('comment_id')->references('id')->on('posts')->onDelete('cascade');
            // $table->foreign('comment_id')->references('id')->on('pages')->onDelete('cascade');
            $table->date('body');
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
