<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name2');
            $table->string('capital');
            $table->tinyInteger('type');
            $table->smallInteger('pc');
            $table->smallInteger('ac');
            $table->decimal('literacy',4,2);
            $table->string('governor');
            $table->string('cm');
            $table->integer('party_id')->comment = "ruling party";
            $table->integer('population');
            $table->smallInteger('rank')->comment = "population rank";
            $table->integer('upo')->comment = "urban population";
            $table->integer('rpo')->comment = "rural population";
            $table->smallInteger('density');
            $table->smallInteger('sex_ratio');
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
        Schema::dropIfExists('states');
    }
}
