<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormElementOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_element_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('form_element_id')->nullable()->unsigned();
            $table->foreign('form_element_id')->references('id')->on('form_elements')->onDelete('cascade');
            $table->string('value');
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('form_element_options');
    }
}
