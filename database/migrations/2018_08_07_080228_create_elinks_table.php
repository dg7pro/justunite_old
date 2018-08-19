<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elinks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indian_id')->unsigned();
            $table->foreign('indian_id')->references('id')->on('indians');
            $table->string('link'); // External link
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
        Schema::dropIfExists('elinks');
    }
}
