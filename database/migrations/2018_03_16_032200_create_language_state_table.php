<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_state', function (Blueprint $table) {
            $table->integer('language_id')->unsigned();
            $table->integer('state_id')->unsigned();

            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
                ->ondelete('cascade');

            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->ondelete('cascade');

            $table->primary(['language_id','state_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_state');
    }
}
