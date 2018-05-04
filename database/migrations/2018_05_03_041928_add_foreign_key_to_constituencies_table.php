<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToConstituenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('constituencies', function (Blueprint $table) {

            $table->integer('ctype_id')->unsigned()->after('pc_name');
            $table->foreign('ctype_id')->references('id')->on('ctypes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('constituencies', function (Blueprint $table) {

            $table->dropForeign(['ctype_id']);
            $table->dropColumn('ctype_id');

        });
    }
}
