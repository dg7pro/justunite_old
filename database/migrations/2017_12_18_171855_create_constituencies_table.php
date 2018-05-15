<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstituenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constituencies', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('state_id')->unsigned()->nullable();
            $table->foreign('state_id')
                ->references('id')->on('states');

            /* pc - parliamentary constituency */
            $table->integer('pc_no');
            $table->string('pc_name');

            /* Changes with different Elections */
            $table->integer('electors');
            $table->integer('voters');
            $table->decimal('turnout',5,4);
            $table->smallInteger('pst')->comment = "polling stations";
            $table->smallInteger('ael')->comment = "average electors";
            $table->smallInteger('nominations');
            $table->smallInteger('contestants');
            $table->smallInteger('forfeited');
            /* End changes with different elections */

            /* ac - assembly constituencies */
            $table->tinyInteger('ac_count');
            $table->text('details');
            $table->timestamps();














            //$table->integer('ctype_id')->unsigned(); // Reserved for General SC or ST

            /*$table->integer('male_electors');
            $table->integer('male_voters');
            $table->decimal('male_turnout',5,4);

            $table->integer('female_electors');
            $table->integer('female_voters');
            $table->decimal('female_turnout',5,4);

            $table->integer('total_electors');
            $table->integer('total_voters');
            $table->decimal('total_turnout',5,4);

            $table->string('winner');
            $table->integer('wi_party');
            $table->integer('wi_votes');

            $table->string('rup');
            $table->integer('rup_party');
            $table->integer('rup_votes');*/


            /*$table->smallInteger('pst')->comment = "polling stations";
            $table->smallInteger('ael')->comment = "average electors";
            $table->smallInteger('nominations');
            $table->smallInteger('contestants');
            $table->smallInteger('forfeited');*/


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constituencies');
    }
}
