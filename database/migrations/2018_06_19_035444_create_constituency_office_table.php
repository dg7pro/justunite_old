<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstituencyOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constituency_office', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('constituency_id')->unsigned();
            $table->foreign('constituency_id')
                ->references('id')->on('constituencies')
                ->onDelete('cascade');

            $table->integer('office_id')->unsigned();
            $table->foreign('office_id')
                ->references('id')->on('offices')
                ->onDelete('cascade');

            $table->tinyInteger('active')->default(0);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->date('start')->nullable();
            $table->date('end')->nullable();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('constituency_office');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
