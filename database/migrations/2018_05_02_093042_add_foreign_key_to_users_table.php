<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->integer('age_id')->unsigned()->nullable();
            $table->integer('gender_id')->unsigned()->nullable();
            $table->integer('religion_id')->unsigned()->nullable();
            $table->integer('marital_id')->unsigned()->nullable();
            $table->integer('education_id')->unsigned()->nullable();
            $table->integer('profession_id')->unsigned()->nullable();

            $table->integer('group_id')->unsigned()->nullable();
            $table->smallInteger('credits')->default(0); // No of votes which user can give.
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('constituency_id')->unsigned()->nullable();

            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('age_id')->references('id')->on('ages');
            $table->foreign('religion_id')->references('id')->on('religions');
            $table->foreign('marital_id')->references('id')->on('maritals');
            $table->foreign('education_id')->references('id')->on('educations');
            $table->foreign('profession_id')->references('id')->on('professions');

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('constituency_id')->references('id')->on('constituencies');



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


            //$table->dropIndex(['gender_id']);
            $table->dropForeign(['gender_id']);
            $table->dropForeign(['age_id']);
            $table->dropForeign(['religion_id']);
            $table->dropForeign(['marital_id']);
            $table->dropForeign(['education_id']);
            $table->dropForeign(['profession_id']);

            $table->dropForeign(['group_id']);
            $table->dropForeign(['state_id']);
            $table->dropForeign(['constituency_id']);

            $table->dropColumn('gender_id');
            $table->dropColumn('age_id');
            $table->dropColumn('religion_id');
            $table->dropColumn('marital_id');
            $table->dropColumn('education_id');
            $table->dropColumn('profession_id');

            $table->dropColumn('group_id');
            $table->dropColumn('credits');
            $table->dropColumn('state_id');
            $table->dropColumn('constituency_id');

            /*$table->dropForeign('users_gender_id_foreign');
            $table->dropForeign('users_age_id_foreign');
            $table->dropForeign('users_religion_id_foreign');
            $table->dropForeign('users_marital_id_foreign');
            $table->dropForeign('users_education_id_foreign');
            $table->dropForeign('users_profession_id_foreign');*/

        });
    }
}
