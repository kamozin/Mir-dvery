<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHareckteristic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //название характиристики
            $table->string('img'); //название характиристики
            $table->integer('id_directory'); //id справочника
            $table->integer('id_razdel'); //id раздела
            $table->rememberToken();
            $table->softDeletes();
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
        //
    }
}
