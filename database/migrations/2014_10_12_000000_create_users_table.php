<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique()->nullable();
            $table->string('password');

            $table->integer('group_id')->nullable();
            $table->smallInteger('credits')->default(0); // No of votes which user can give.

            $table->smallInteger('state_id')->nullable();
            $table->smallInteger('constituency_id')->nullable();

            $table->integer('age_id')->nullable();
            //$table->foreign('age_id')->references('id')->on('ages');
            $table->integer('gender_id')->nullable();
            //$table->foreign('gender_id')->references('id')->on('genders');
            $table->integer('religion_id')->nullable();
            //$table->foreign('religion_id')->references('id')->on('religions');
            $table->integer('marital_id')->nullable();
            //$table->foreign('marital_id')->references('id')->on('maritals');
            $table->integer('education_id')->nullable();
            //$table->foreign('education_id')->references('id')->on('educations');
            $table->integer('profession_id')->nullable();
            //$table->foreign('profession_id')->references('id')->on('professions');

            $table->ipAddress('last_login_ip')->nullable();
            $table->timestamp('last_login')->useCurrent();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
