<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ptype_id')->unsigned();
            $table->string('name');
            $table->string('abbreviation');
            $table->string('symbol');
            $table->date('year');
            $table->text('founder');
            $table->string('president');
            $table->text('leadership');
            $table->text('headquarter');
            $table->string('img');
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
        Schema::dropIfExists('parties');
    }
}
