<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parties', function (Blueprint $table) {

            $table->integer('ptype_id')->unsigned()->after('id');
            $table->foreign('ptype_id')->references('id')->on('ptypes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parties', function (Blueprint $table) {

            $table->dropForeign(['ptype_id']);
            $table->dropColumn('ptype_id');

        });
    }
}
