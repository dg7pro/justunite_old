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
            $table->integer('pc_no');  // pc - Parliamentary constituency
            $table->string('pc_name');
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

            $table->tinyInteger('no_of_ac');  // ac - assembly constituencies
            /*$table->smallInteger('pst')->comment = "polling stations";
            $table->smallInteger('ael')->comment = "average electors";
            $table->smallInteger('nominations');
            $table->smallInteger('contestants');
            $table->smallInteger('forfeited');*/

            $table->text('details');

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
        Schema::dropIfExists('constituencies');
    }
}
