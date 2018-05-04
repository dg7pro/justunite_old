<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('know_user', function(Blueprint $table)
        {
            $table->integer('know_id')->unsigned()->comment('known by user_id');
            $table->integer('user_id')->unsigned()->comment('knows know_id');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('know_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->primary(array('user_id', 'know_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('know_user');
    }
}
