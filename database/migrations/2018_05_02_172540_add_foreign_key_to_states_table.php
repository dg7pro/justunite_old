<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('states', function (Blueprint $table) {

            $table->integer('stype_id')->unsigned()->after('capital');
            $table->foreign('stype_id')->references('id')->on('stypes');
            $table->integer('ruling_id')->unsigned()->after('cm')->comment = "ruling party";
            $table->foreign('ruling_id')->references('id')->on('parties');
            $table->integer('opposition_id')->unsigned()->after('ruling_id')->comment = "opposition party";
            $table->foreign('opposition_id')->references('id')->on('parties');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('states', function (Blueprint $table) {

            $table->dropForeign(['stype_id']);
            $table->dropForeign(['ruling_id']);
            $table->dropForeign(['opposition_id']);

            $table->dropColumn('stype_id');
            $table->dropColumn('ruling_id');
            $table->dropColumn('opposition_id');

        });
    }
}
