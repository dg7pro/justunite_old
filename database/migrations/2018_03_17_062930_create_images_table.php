<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('imagable_id')->unsigned();
            $table->string('imagable_type');
            $table->string('name');
            $table->string('heading');
            $table->string('caption');
            $table->integer('profession_id')->unsigned()->nullable();
            $table->foreign('profession_id')->references('id')->on('professions');
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
        Schema::dropIfExists('images');
    }
}