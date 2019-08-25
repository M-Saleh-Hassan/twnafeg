<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_elements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('form_id')->nullable()->unsigned();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->string('label')->nullable();
            $table->enum('type',['text', 'password', 'checkbox', 'textarea', 'select', 'radio', 'date', 'hidden']);
            $table->string('name');
            $table->string('id_attribute')->nullable();
            $table->string('value')->nullable();
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
        Schema::dropIfExists('form_elements');
    }
}
