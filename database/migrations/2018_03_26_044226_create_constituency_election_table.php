<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstituencyElectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constituency_election', function (Blueprint $table) {

            $table->integer('constituency_id')->unsigned();
            $table->integer('election_id')->unsigned();

            $table->foreign('constituency_id')
                ->references('id')
                ->on('constituencies')
                ->onDelete('cascade');

            $table->foreign('election_id')
                ->references('id')
                ->on('elections')
                ->onDelete('cascade');

            $table->primary(['constituency_id','election_id']);

            $table->integer('electors');
            $table->integer('voters');
            $table->decimal('turnout',5,4);

            /*$table->integer('male_electors');
            $table->integer('male_voters');
            $table->decimal('male_turnout',5,4);

            $table->integer('female_electors');
            $table->integer('female_voters');
            $table->decimal('female_turnout',5,4);

            $table->integer('total_electors');
            $table->integer('total_voters');
            $table->decimal('total_turnout',5,4);*/

            $table->smallInteger('pst')->comment = "polling stations";
            $table->smallInteger('ael')->comment = "average electors";
            $table->smallInteger('nominations');
            $table->smallInteger('contestants');
            $table->smallInteger('forfeited');
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
        Schema::dropIfExists('constituency_election');
        Schema::enableForeignKeyConstraints();
    }
}
