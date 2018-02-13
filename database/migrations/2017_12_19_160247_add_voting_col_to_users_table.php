<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotingColToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->smallInteger('state_id')->after('password')->nullable();
            $table->smallInteger('constituency_id')->after('state_id')->nullable();
            $table->smallInteger('credits')->after('constituency_id')->default(0); // No of votes which user can give.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('state_id');
            $table->dropColumn('constituency_id');
            $table->dropColumn('credits');
        });
    }
}
