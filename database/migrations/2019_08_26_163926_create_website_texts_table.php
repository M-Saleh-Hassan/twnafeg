<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_texts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('how_it_started');
            $table->text('quote1');
            $table->text('then_in_egypt');
            $table->text('quote2');
            $table->text('camps_description');
            $table->text('internationally_today');
            $table->text('vision');
            $table->text('quote3');
            $table->text('mother_design');
            $table->text('quote4');
            $table->text('who_we_are');
            $table->text('get_in_touch');
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
        Schema::dropIfExists('website_texts');
    }
}
