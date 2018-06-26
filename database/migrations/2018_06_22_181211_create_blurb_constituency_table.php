<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBlurbConstituencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blurb_constituency', function(Blueprint $table)
        {
            $table->integer('blurb_id')->unsigned();
            $table->foreign('blurb_id')
                ->references('id')->on('blurbs')
                ->onDelete('cascade');


            $table->integer('constituency_id')->unsigned();
            $table->foreign('constituency_id')
                ->references('id')->on('constituencies')
                ->onDelete('cascade');


            $table->primary(['blurb_id','constituency_id']);

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
        Schema::dropIfExists('blurb_constituency');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
