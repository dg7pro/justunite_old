<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contestants', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');

            $table->integer('gender_id')->unsigned()->nullable();
            $table->foreign('gender_id')->references('id')->on('genders');

            $table->string('party');
            $table->integer('party_id')->unsigned()->nullable();
            $table->foreign('party_id')->references('id')->on('parties');

            $table->integer('constituency_id')->unsigned()->nullable();
            $table->foreign('constituency_id')->references('id')->on('constituencies');

            /*$table->integer('election_id')->unsigned()->nullable();
            $table->foreign('election_id')->references('id')->on('elections');*/

            $table->integer('votes');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('contestants');
        Schema::enableForeignKeyConstraints();
    }
}
